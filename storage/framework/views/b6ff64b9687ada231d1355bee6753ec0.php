<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin::layouts.partials.loads-user-custom-fonts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div wire:ignore>
        <style>
            body {
                padding-left: 15px;
                padding-top: 10px;
            }
        </style>

        <script>
            function resetTemplateSettings() {
                var askForConfirmText = '<div class="">' +
                    '<h4 class="">' + mw.lang('Are you sure you want to reset template settings ?') + '</h4>' +

                    '</div>';

                mw.tools.confirm_reset_module_by_id('<?php echo e($optionGroup); ?>', function () {
                    // Reset template settings
                }, askForConfirmText);

            }

            function resetStylesheetSettings() {
                var askForConfirmText = '<div class="">' +
                    '<h4 class="">' + mw.lang('Are you sure you want to reset stylesheet settings ?') + '</h4>' +

                    '</div>';

                mw.tools.confirm_reset_module_by_id('<?php echo e($optionGroupLess); ?>', function () {
                    // Reset template settings
                    mw.top().app.templateSettings.reloadStylesheet('<?php echo e($styleSheetSourceFile); ?>', '<?php echo e($optionGroupLess); ?>');
                    setTimeout(function () {
                        mw.top().win.location.reload();
                    }, 3000)

                }, askForConfirmText);

            }



            document.addEventListener('mw-option-saved', function () {


                if (mw.top().app.fontManager) {
                    mw.top().app.fontManager.reloadLiveEdit();
                }


                // var customFontsStylesheet = mw.top().app.canvas.getDocument().getElementById("mw-custom-user-css");
                // if (customFontsStylesheet != null) {
                //     var customFontsStylesheetRestyle = mw.settings.api_url + 'template/print_custom_css?time=' + Math.random(0, 10000);
                //     customFontsStylesheet.href = customFontsStylesheetRestyle;
                // }

                setTimeout(function () {
                    mw.top().app.templateSettings.reloadStylesheet('<?php echo e($styleSheetSourceFile); ?>', '<?php echo e($optionGroupLess); ?>');
                }, 1000);

            });
        </script>

        <script>
            function openRTECSsEditor2(settings) {

                console.log('openRTECSsEditor2', settings);

                let iframeStyleEdiorId = 'iframeStyleEditorId-1';
                let checkIframeStyleEditor = document.getElementById(iframeStyleEdiorId);

                if (!checkIframeStyleEditor) {
                    var moduleType = 'piksera/toolbar/editor_tools/rte_css_editor2';
                    var attrsForSettings = {};

                    attrsForSettings.live_edit = true;
                    attrsForSettings.module_settings = true;
                    attrsForSettings.id = 'mw_global_rte_css_editor2_editor';
                    attrsForSettings.type = moduleType;
                    attrsForSettings.iframe = true;
                    attrsForSettings.disable_auto_element_change = true;
                    attrsForSettings.output_static_selector = true;
                    attrsForSettings.from_url = mw.top().app.canvas.getWindow().location.href;

                    var src = route('live_edit.module_settings') + "?" + json2url(attrsForSettings);

                    $('#iframe-holder').html('<iframe id="' + iframeStyleEdiorId + '" src="' + src + '" style="width:100%;height:500px;border:none;"></iframe>');

                    document.getElementById(iframeStyleEdiorId).addEventListener('load', function (e) {
                        // alert('iframe loaded');
                        // alert(settings.selectors[0]);
                        mw.top().app.dispatch('cssEditorSelectElementBySelector', settings.selectors[0]);
                    });

                } else {
                    mw.top().app.dispatch('cssEditorSelectElementBySelector', settings.selectors[0]);
                }

            }

            function openRTECSsEditor2Vue(settings) {

                let iframeStyleEdiorId = 'iframeStyleEditorId-Vue';
                let checkIframeStyleEditor = document.getElementById(iframeStyleEdiorId);

                // //temp fix
                // if (checkIframeStyleEditor) {
                //     $('#'+iframeStyleEdiorId).remove();
                //     checkIframeStyleEditor = null;
                // }

                if (!checkIframeStyleEditor) {
                    var moduleType = 'piksera/toolbar/editor_tools/rte_css_editor2/rte_editor_vue';
                    var attrsForSettings = {};

                    attrsForSettings.live_edit = true;
                    attrsForSettings.module_settings = true;
                    attrsForSettings.id = 'mw_global_rte_css_editor2_editor_vue';
                    attrsForSettings.type = moduleType;
                    attrsForSettings.iframe = true;
                    attrsForSettings.disable_auto_element_change = true;
                    attrsForSettings.output_static_selector = true;
                    attrsForSettings.from_url = mw.top().app.canvas.getWindow().location.href;

                    var src = route('live_edit.module_settings') + "?" + json2url(attrsForSettings);

                    $('#iframe-holder').append('<iframe id="' + iframeStyleEdiorId + '" src="' + src + '" style="width:100%;height:500px;border:none;"></iframe>');

                    document.getElementById(iframeStyleEdiorId).addEventListener('load', function (e) {
                        // alert('iframe loaded');
                        // alert(settings.selectors[0]);
                        mw.top().app.dispatch('cssEditorSelectElementBySelector', settings.selectors[0]);
                        mw.top().app.dispatch('cssEditorSettings', settings);
                    });

                } else {
                    mw.top().app.dispatch('cssEditorSelectElementBySelector', settings.selectors[0]);
                    mw.top().app.dispatch('cssEditorSettings', settings);
                }

                // console.log(settings);
            }

            mw.top().app.on('mw.rte.css.editor2.open', function (e) {
                // openRTECSsEditor2(e);
                openRTECSsEditor2Vue(e);
            });


        </script>


        <?php if(isset($styleSettings)): ?>

            <div
                x-data="{styleEditorData:{}, showStyleSettings: '/'}"

                x-init="()=>{
            $watch('styleEditorData', (value) => {
                if (value.selectors) {
                    mw.top().app.dispatch('mw.rte.css.editor2.open', value);
                }
            });
        }"
            >

                    <?php if (!empty($styleSettings)): ?>
                <div class="mt-5">
            <span
                x-show="showStyleSettings == '/'"
                class="fs-2 font-weight-bold settings-main-group d-flex align-items-center justify-content-between">
               Styles

                <div class="d-flex align-items-end" style="display: none">


                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset stylesheet settings"
                            class="reset-template-settings-and-stylesheet-button" x-on:click="()=> {
                            resetStylesheetSettings();
                        }">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                             width="24"><path
                                d="M440-122q-121-15-200.5-105.5T160-440q0-66 26-126.5T260-672l57 57q-38 34-57.5 79T240-440q0 88 56 155.5T440-202v80Zm80 0v-80q87-16 143.5-83T720-440q0-100-70-170t-170-70h-3l44 44-56 56-140-140 140-140 56 56-44 44h3q134 0 227 93t93 227q0 121-79.5 211.5T520-122Z"/></svg>

                    </button>
                </div>
            </span>

                    <?php $__currentLoopData = $styleSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $styleSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div
                            <?php if(isset($styleSetting['main'])): ?>
                                x-show="showStyleSettings == '/'"
                            <?php else: ?>
                                x-show="showStyleSettings == '<?php echo e($styleSetting['url']); ?>'"
                            <?php endif; ?>


                            class="my-3">

                            <div
                                x-show="showStyleSettings == '/'"
                            >
                                <?php if(isset($styleSetting['title'])): ?>
                                    <a x-on:click="showStyleSettings = '<?php echo e($styleSetting['url']); ?>'"
                                       class="mw-admin-action-links mw-adm-liveedit-tabs settings-main-group">
                                        <?php echo e($styleSetting['title']); ?>

                                    </a>
                                <?php endif; ?>

                            </div>

                            <div x-show="showStyleSettings == '<?php echo e($styleSetting['url']); ?>'">

                                <div>
                                    <button x-on:click="showStyleSettings = '<?php echo e($styleSetting['backUrl']); ?>'"
                                            class="d-flex gap-2 btn btn-link mw-live-edit-toolbar-link mw-live-edit-toolbar-link&#45;&#45;arrowed text-start text-start"
                                            type="button">
                                        <svg class="mw-live-edit-toolbar-arrow-icon" xmlns="http://www.w3.org/2000/svg"
                                             width="32" height="32" viewBox="0 0 32 32">
                                            <g fill="none" stroke-width="1.5" stroke-linejoin="round"
                                               stroke-miterlimit="10">
                                                <circle class="arrow-icon&#45;&#45;circle" cx="16" cy="16"
                                                        r="15.12"></circle>
                                                <path class="arrow-icon&#45;&#45;arrow"
                                                      d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                            </g>
                                        </svg>
                                        <div class="ms-1 font-weight-bold">
                                            Back
                                        </div>
                                    </button>
                                </div>

                                <div>
                                    <?php if(isset($styleSetting['title'])): ?>
                                        <h4><?php echo e($styleSetting['title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if(isset($styleSetting['description'])): ?>
                                        <p><?php echo e($styleSetting['description']); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if(isset($styleSetting['fieldType'])): ?>
                                    <?php echo $__env->make('template::livewire.live-edit.template-setting-render', [
                                            'setting' => $styleSetting,
                                            'parent' => $styleSetting['parent'] ?? false
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php if(isset($styleSetting['settings'])): ?>
                                    <?php $__currentLoopData = $styleSetting['settings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('template::livewire.live-edit.template-setting-render', [
                                            'setting' => $setting,
                                            'parent' => $styleSetting['parent'] ?? false
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php endif; ?>

                    <?php if (!empty($settingsGroups)): ?>
                <div

                    x-show="showStyleSettings == 'styleEditor'"
                    class="mt-3"
                >

                    <div>
                        <button x-on:click="showStyleSettings = styleEditorData.backUrl"
                                class="d-flex gap-2 btn btn-link mw-live-edit-toolbar-link mw-live-edit-toolbar-link&#45;&#45;arrowed text-start text-start"
                                type="button">
                            <svg class="mw-live-edit-toolbar-arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 32 32">
                                <g fill="none" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                    <circle class="arrow-icon&#45;&#45;circle" cx="16" cy="16" r="15.12"></circle>
                                    <path class="arrow-icon&#45;&#45;arrow"
                                          d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                </g>
                            </svg>
                            <div class="ms-1 font-weight-bold">
                                Back
                            </div>
                        </button>
                    </div>

                    <b x-show="styleEditorData.title" x-html="styleEditorData.title"></b>
                    <p x-show="styleEditorData.description" x-html="styleEditorData.description"></p>

                    <div class="my-3">
                        <div id="iframe-holder"></div>
                    </div>
                </div>
                <?php $__currentLoopData = $settingsGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingGroupName=>$settingGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div wire:key="setting-group-key-<?php echo e(md5($settingGroupName)); ?>" class="mt-3">

                        <div class="mt-5 d-flex align-items-center justify-content-between"
                             x-show="showStyleSettings == '/'">
                            <a class="fs-2 font-weight-bold tblr-body-color text-decoration-none settings-main-group">
                                <?php echo e($settingGroupName); ?>

                            </a>

                                <?php /* this is the import export style  button
                            @if($settingGroup['type'] == 'stylesheet')

                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Import Export template settings"
                                        class="import-export-template-settings-and-stylesheet-button" x-on:click="()=> {
                                            importExportTemplateStylesheetSettings();
                                     }">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-160v-80h400v80H280Zm160-160v-327L336-544l-56-56 200-200 200 200-56 56-104-103v327h-80Z"/></svg>

                                </button>

                            @endif

                            */ ?>

                                <?php /* this is the reset button*/ ?>


                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Reset template settings"
                                    class="reset-template-settings-and-stylesheet-button" x-on:click="()=> {

                                    <?php if($settingGroup['type'] == 'stylesheet'): ?>
                                        resetStylesheetSettings();
                                    <?php endif; ?>

                                     <?php if($settingGroup['type'] == 'template'): ?>
                                            resetTemplateSettings();
                                      <?php endif; ?>

                                    }">
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="24"
                                     viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M440-122q-121-15-200.5-105.5T160-440q0-66 26-126.5T260-672l57 57q-38 34-57.5 79T240-440q0 88 56 155.5T440-202v80Zm80 0v-80q87-16 143.5-83T720-440q0-100-70-170t-170-70h-3l44 44-56 56-140-140 140-140 56 56-44 44h3q134 0 227 93t93 227q0 121-79.5 211.5T520-122Z"/>
                                </svg>

                            </button>


                        </div>

                        <div>
                            <?php $__currentLoopData = $settingGroup['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingName=>$settingFields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div wire:key="setting-values-key-<?php echo e(md5($settingName)); ?>">

                                    <div x-show="showStyleSettings == 'setting-values-key-<?php echo e(md5($settingName)); ?>'">
                                        <button x-on:click="showStyleSettings = '/'"
                                                class="d-flex gap-2 btn btn-link mw-live-edit-toolbar-link mw-live-edit-toolbar-link--arrowed text-start text-start"
                                                type="button">
                                            <svg class="mw-live-edit-toolbar-arrow-icon"
                                                 xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 viewBox="0 0 32 32">
                                                <g fill="none" stroke-width="1.5" stroke-linejoin="round"
                                                   stroke-miterlimit="10">
                                                    <circle class="arrow-icon--circle" cx="16" cy="16"
                                                            r="15.12"></circle>
                                                    <path class="arrow-icon--arrow"
                                                          d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                                </g>
                                            </svg>
                                            <div class="ms-1 font-weight-bold">
                                                Back to <?php echo e(mb_strtolower($settingGroupName)); ?>

                                            </div>
                                        </button>
                                    </div>

                                    <div x-show="showStyleSettings == '/'" class="my-3">
                                        <a x-on:click="showStyleSettings = 'setting-values-key-<?php echo e(md5($settingName)); ?>'"
                                           class="mw-admin-action-links">
                                            <b><?php echo e($settingName); ?></b>
                                        </a>
                                    </div>

                                    <div x-show="showStyleSettings == 'setting-values-key-<?php echo e(md5($settingName)); ?>'">
                                        <?php $__currentLoopData = $settingFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingFieldKey=>$settingField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div wire:key="setting-field-key-<?php echo e(md5($settingFieldKey)); ?>">
                                                <?php
                                                    $settingFieldOptionGroup = $settingField['optionGroup'];
                                                ?>

                                                <?php if($settingField['type'] == 'font_selector'): ?>

                                                    <div class="mt-3">
                                                        <label class="live-edit-label">
                                                            <?php echo e($settingField['label']); ?>

                                                        </label>
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::font-picker', ['label' => ''.e($settingField['label']).'','optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup])->html();
} elseif ($_instance->childHasBeenRendered('l3258905760-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3258905760-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3258905760-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3258905760-0');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::font-picker', ['label' => ''.e($settingField['label']).'','optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup]);
    $html = $response->html();
    $_instance->logRenderedChild('l3258905760-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>

                                                <?php elseif($settingField['type'] == 'color'): ?>
                                                    <div class="mt-3">
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::color-picker', ['label' => ''.e($settingField['label']).'','optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup])->html();
} elseif ($_instance->childHasBeenRendered('l3258905760-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3258905760-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3258905760-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3258905760-1');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::color-picker', ['label' => ''.e($settingField['label']).'','optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup]);
    $html = $response->html();
    $_instance->logRenderedChild('l3258905760-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>
                                                <?php elseif($settingField['type'] == 'dropdown'): ?>
                                                    <div class="mt-4 mb-3">
                                                        <label class="live-edit-label">
                                                            <?php echo e($settingField['label']); ?> <br/>
                                                            <?php if(isset($settingField['help'])): ?>
                                                                <?php echo e($settingField['help']); ?>

                                                            <?php endif; ?>
                                                        </label>
                                                        <?php
                                                            $dropdownOptions = $settingField['options'];
                                                        ?>


                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::dropdown', ['dropdownOptions' => $dropdownOptions,'optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup])->html();
} elseif ($_instance->childHasBeenRendered('l3258905760-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3258905760-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3258905760-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3258905760-2');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::dropdown', ['dropdownOptions' => $dropdownOptions,'optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup]);
    $html = $response->html();
    $_instance->logRenderedChild('l3258905760-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>
                                                <?php else: ?>
                                                    <div>
                                                        <label class="live-edit-label">
                                                            <?php echo e($settingField['label']); ?>

                                                        </label>
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('piksera-option::text', ['optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup])->html();
} elseif ($_instance->childHasBeenRendered('l3258905760-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l3258905760-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3258905760-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3258905760-3');
} else {
    $response = \Livewire\Livewire::mount('piksera-option::text', ['optionKey' => $settingFieldKey,'optionGroup' => $settingFieldOptionGroup]);
    $html = $response->html();
    $_instance->logRenderedChild('l3258905760-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.iframe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Template/resources/views/livewire/live-edit/template-settings-sidebar.blade.php ENDPATH**/ ?>