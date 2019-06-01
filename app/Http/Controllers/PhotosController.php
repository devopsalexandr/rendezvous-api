<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotosController extends Controller
{
    protected $user;

    public function __construct(?Authenticatable $user)
    {
        $this->user = $user;
    }

    public function index(): JsonResource
    {
        return PhotoResource::collection($this->user->photos);
    }

    public function store(Request $request): PhotoResource
    {
        $uploadedPhoto = $request->file('file');

        $photoNameToStore = uniqid($this->user->id . '_'). "." .$uploadedPhoto->getClientOriginalExtension();

        $photo = $this->user->photos()->create([
            'name' => $photoNameToStore
        ]);

        $uploadedPhoto->storeAs($photo->storageFilesPathOfUser(), $photoNameToStore);

        $this->user->save();

        return new PhotoResource($photo);
    }
}
