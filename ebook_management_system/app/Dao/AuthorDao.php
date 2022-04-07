<?php

namespace App\Dao;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Author;
use Illuminate\Http\Request;

/**
 * Data Access Object for Author
 */
class AuthorDao implements AuthorDaoInterface
{
    /**
     * To get author
     * @param Request $request request including inputs
     * @return array list of authors with pagination 10
     */
    public function getauthors(Request $request)
    {
        if ($request->has('view_deleted')) {
            return Author::onlyTrashed()->paginate(10);
        } else {
            return Author::with('user')->paginate(10);
        }
    }

    /**
     * To store author
     * @param Request $request request including inputs
     * @return Object created author object
     */
    public function store(Request $request)
    {
        return  Author::create($request->all());
    }

    /**
     * To delete author by id
     * @param integer $id author id
     * @return Object deleted author object
     */
    public function deleteById($id)
    {
        $author = Author::findOrFail($id);
        foreach ($author->books as $book) {
            $book->borrow()->delete();
            $book->delete();
        }
        return $author->delete();
    }

    /**
     * To show author edit form by id
     * @param integer $id author id
     * @return Object found or failed author object
     */
    public function editAuthor($id)
    {
        return  Author::findOrFail($id);
    }

    /**
     * To update author with values from request
     * @param Request $request request including inputs
     * @param integer $id author id
     * @return Object updated author object
     */
    public function updateInfo(Request $request, $id)
    {
        return Author::whereId($id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description
            ]
        );
    }

    /**
     * To see detail about author by id
     * @param integer $id author id
     * @return Object found author object
     */
    public function detailAuthor($id)
    {
        return Author::with('user')->find($id);
    }

    /**
     * To search author data
     * @param Request $request request including inputs
     * @return Object searched author object
     */
    public function authorsSearch($search)
    {
        return Author::with('user')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(10);
    }
}
