<?php

namespace App\Http\Controllers;
use App\Models\CommentSafePlaces;
use Illuminate\Http\Request;

class CommentSafePlacesController extends Controller
{
    public function index()
    {
        $comments = CommentSafePlaces::all();
        return response()->json($comments);
    }

    public function show($id)
    {
        $comment = CommentSafePlaces::find($id);
        return response()->json($comment);
    }

    public function store(Request $request)
    {
        $comment = CommentSafePlaces::create($request->all());
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = CommentSafePlaces::find($id);
        $comment->update($request->all());
        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = CommentSafePlaces::find($id);
        $comment->delete();
        return response()->json($comment);
    }
}
