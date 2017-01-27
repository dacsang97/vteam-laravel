<?php

namespace App\Http\Controllers\HiddenLink;

use App\HiddenLink\Link;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LinkController extends Controller
{
    public function create() {
        return view('hidden.create');
    }

    public function notAccess() {
        return view('hidden.NotAccess', [
            'message' => 'Website hiện đang phát triển nên tính năng này chỉ truy cập được bởi Admin.
        Xin lỗi vì bất tiện này. ^^',
        ]);
    }

    public function store(Request $request){
        $l_data = $request->only('hide_link', 'post_link', 'comments_lock', 'reactions_lock');
        $l_data['user_id'] = auth()->user()->id;
        $hashids = new Hashids('VProTecTedLiNk', 8);
        $l_data['hash_id'] = $hashids->encode(Link::all()->count());
//        dd($l_data);
        try {
            $link = Link::create($l_data);
        } catch (\Exception $e) {
            throw $e;
        }
        if ($link) {
            return "OK";
        }
    }

    public function edit() {
        $links = Link::all();
        return view('hidden.edit', [
            'links' => $links,
        ]);
    }

    public function checkReaction($data) {
        $providerUser = auth()->user()->providerUser()->first();
        $provider_user_id = $providerUser->provider_user_id;
        foreach ($data as $item) {
            if ($item->id == $provider_user_id)
                return true;
        }
        return false;
    }

    public function checkComment($data) {
        $providerUser = auth()->user()->providerUser()->first();
        $provider_user_id = $providerUser->provider_user_id;
        foreach ($data as $item) {
            if ($item->from->id == $provider_user_id)
                return true;
        }
        return false;
    }

    public function view($hash_id, Request $request){
        $link = Link::where('hash_id', $hash_id)->first();
        if (empty($link)) {
            return view('hidden.NotAccess', [
                'message' => 'Link không tồn tại :\'(',
            ]);
        }
        $fb = new FBRequest();
        $strs = explode('/', $link->post_link);
        $postId = $strs[count($strs) - 1];

        $reactionData = $fb->getReactions($postId);
        $commentData  = $fb->getComments($postId);

        // Check condition
        // Enough Reactions
        $e_reaction = ($link->reactions_lock <= count($reactionData));
        // Enough Comments
        $e_comment = ($link->comments_lock <= count($commentData));
        // isReactioned
        $is_reactioned = $this->checkReaction($reactionData);
        // isCommented
        $is_commented = $this->checkComment($commentData);

        return view('hidden.view', [
            'link' => $link,
            'e_comment' => $e_comment,
            'e_reaction' => $e_reaction,
            'is_commented' => $is_commented,
            'is_reactioned' => $is_reactioned,
            'comment' => count($commentData),
            'reaction' => count($reactionData),
        ]);
    }
}
