<?php

declare(strict_types=1);

namespace App\Http\Controllers\Conversations;

use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\Conversation\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationMessagesController extends Controller
{
    public function index(Conversation $conversation): JsonResource
    {
        $this->authorize('view', $conversation);

        $messages = $conversation->messages()->orderBy('created_at', 'asc')->paginate(20);

        return MessageResource::collection($messages);
    }

    public function store(Request $request): JsonResource
    {
        //Todo: authorize action, check in ban list

        $conversation = Conversation::where([
            ['user_one', $request->user()->id],
            ['user_two', $request->receiverId],
        ])->orWhere([
            ['user_one', $request->receiverId],
            ['user_two', $request->user()->id],
        ])->first();

        if(!$conversation){
            $conversation = Conversation::create([
                'user_one' => $request->user()->id,
                'user_two' => $request->receiverId,
            ]);

            // Todo: Broadcast conversation created
        }

        $message = $conversation->messages()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        // Todo: Broadcast message created

        return new MessageResource($message);
    }
}
