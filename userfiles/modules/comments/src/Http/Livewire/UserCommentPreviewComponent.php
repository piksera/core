<?php

namespace PikseraPackages\Modules\Comments\Http\Livewire;

use Livewire\Component;
use PikseraPackages\Livewire\Auth\Access\AuthorizesRequests;
use PikseraPackages\Modules\Comments\Models\Comment;

class UserCommentPreviewComponent extends Component {

    use AuthorizesRequests;

    public $comment = [];
    public $showReplies = false;
    public $editForm = false;
    public $editText = '';

    protected $listeners = [
        'commentAdded' => 'refreshIfReplyIsToMe',
        'commentDeleted' => 'refreshIfReplyIsToMe',
        'commentUpdated' => 'refreshIfReplyIsToMe',
    ];

    public function edit()
    {
        $this->authorize('update', $this->comment);

        $this->editText = $this->comment->comment_body;
        $this->editForm = true;
    }

    public function save()
    {
        $this->authorize('update', $this->comment);

        $this->validate(['editText' => 'required']);

        $this->comment->update([
            'comment_body' => $this->editText,
        ]);

        $this->editForm = false;
    }

    public function refreshIfReplyIsToMe($id) {
        if ($id == $this->comment->id) {
            $this->showReplies = true;
            $this->emit('$refresh');
        }
    }

    public function delete()
    {
       $this->authorize('delete', $this->comment);

       $this->emit('deleteComment', $this->comment->id);
    }

    public function render()
    {
        return view('comments::livewire.user-comment-preview-component');
    }

}
