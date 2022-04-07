<?php

namespace App\Dao;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Borrow;
use App\Contracts\Dao\BorrowDaoInterface;
use App\Mail\BookRentalMail;

/**
 * Data Access Object for Borrow
 */
class BorrowDao implements BorrowDaoInterface
{
    /**
     * model
     */
    private $model;

    /**
     * Class Constructor
     * @param Borrow
     * @return
     */
    public function __construct(Borrow $model)
    {
        $this->model = $model;
    }

    /**
     * To get borrow list
     * @return array list of borrowed books
     */
    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
            $query->where('start_date', 'LIKE', '%' . $search . '%')
                ->orWhere('end_date', 'LIKE', '%' . $search . '%')
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('user', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                })
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('book', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                });
        })->latest()->paginate(10);
    }

    /**
     * To delete borrow
     * @param integer $borrow borrow id
     * @return Object deleted borrow object
     */
    public function delete($borrow)
    {
        return $borrow->delete($borrow);
    }

    /**
     * To send expire mail
     * @return message for success or no book rental expire mail to send
     */
    public function getRentalExpireMail()
    {
        $details = Borrow::with('user', 'book')->where('end_date', '<', Carbon::now())
            ->where('mail_status', '=', 'pending')->get();
        if (count($details) > 0) {
            foreach ($details as $detail) {
                $useremail = $detail->user->email;
                Mail::to($useremail)->send(new BookRentalMail($detail));
                $detail->mail_status = 'completed';
                $detail->save();
            }
            return 'Email send successfull';
        } else {
            return 'There is no book rental expire mail to send!';
        }
    }
}
