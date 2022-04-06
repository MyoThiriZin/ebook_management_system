<?php
namespace App\Dao;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Borrow;
use App\Contracts\Dao\BorrowDaoInterface;
use App\Mail\BookRentalMail;

class BorrowDao implements BorrowDaoInterface
{
    private $model;

    public function __construct(Borrow $model)
    {
        $this->model = $model;
    }

    /**
     * To show borrow books and serch borrow book info
     * 
     * @return Object borrow books object
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
     * To delete borrow book by id
     * @param string $borrow borrow id
     * @return Object $borrow borrow object
     */
    public function delete($borrow)
    {
        return $borrow->delete($borrow);
    }

    /**
     * To send book rental expire mail
     * 
     * @return string $message message success or not
     */
    public function getRentalExpireMail()
    {
        $details = Borrow::with('user','book')->where('end_date', '<', Carbon::now())
        ->where('mail_status', '=', 'pending')->get();
        if (count($details) > 0) {
            foreach($details as $detail) {
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
