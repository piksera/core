<?php
$randId = time() . rand(111,999);

?>

<div x-data="{
    selectedFont: '', openOptions:false,
    availableFonts: <?php echo e(json_encode(app()->template->getFonts())); ?>,
}"
     x-init="
      () => {

     setTimeout(function() {
            inputFontElement = document.getElementById('input-font-<?php echo e($randId); ?>');
            inputFontElement.dispatchEvent(new Event('loaded'));
            inputFontElement.addEventListener('input', function () {
                selectedFont = inputFontElement.value;
            });
        }, 300);

      if (mw.top().app && mw.top().app.fontManager) {

            mw.top().app.fontManager.subscribe((fonts) => {
              availableFonts = fonts;
            });

            mw.top().app.fontManager.subscribeToSelectedFont((selectedFontEvent) => {

                if (selectedFontEvent.applyToSelectedElement == '#<?php echo e($randId); ?>') {
                    selectedFont = selectedFontEvent.fontFamily;
                    openOptions = false;
                    inputFontElement = document.getElementById('input-font-<?php echo e($randId); ?>');
                    inputFontElement.value = selectedFont;
                    inputFontElement.dispatchEvent(new Event('input'));
                }

            });
        }
      }"
     class="form-control-live-edit-label-wrapper">

    <button type="button" class="form-select form-control-live-edit-input"
            :style="{ fontFamily: [selectedFont] }"
            x-on:click="openOptions = !openOptions" x-html="selectedFont" @click.outside="openOptions = false">
    </button>

    <input type="hidden" id="input-font-<?php echo e($randId); ?>" <?php echo $attributes->merge([]); ?> />

    <div style="height:400px;overflow:scroll;" class="dropdown-menu form-control-live-edit-input ps-0" :class="[openOptions ? 'show':'']">

        <template x-for="availableFont in availableFonts">
            <button type="button" class="dropdown-item tblr-body-color"
                    x-on:click="()=> {
                        selectedFont = availableFont;
                        openOptions = false;
                        inputFontElement = document.getElementById('input-font-<?php echo e($randId); ?>');
                        inputFontElement.value = availableFont;
                        inputFontElement.dispatchEvent(new Event('input'));
                    }"
                    :style="{ fontFamily: [availableFont] }">
                <span style="font-size:16px" x-text="availableFont"></span>
            </button>
        </template>

        <button type="button"
                x-on:click="()=> {
                        selectedFont = ''
                        openOptions = false;
                        inputFontElement = document.getElementById('input-font-<?php echo e($randId); ?>');
                        inputFontElement.value = '';
                        inputFontElement.dispatchEvent(new Event('input'));
                 }"
                class="dropdown-item tblr-body-color">
            <?php echo e(_e('Reset font')); ?>

        </button>

        <button type="button"
                x-on:click="()=> {
                    mw.top().app && mw.top().app.fontManager.manageFonts({
                         applySelectionToElement: '#<?php echo e($randId); ?>'
                    });
                }"
                class="dropdown-item tblr-body-color">
            <?php echo e(_e('Add more fonts')); ?>

        </button>

    </div>

</div>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/MicroweberUI/resources/views/components/font-picker.blade.php ENDPATH**/ ?>