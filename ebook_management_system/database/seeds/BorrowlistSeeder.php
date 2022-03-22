<?php
use Illuminate\Database\Seeder;
use App\User;


class BorrowlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'user_id' => '1',
                'book_id' => '2',
                'start_date' => '20.3.2022',
                'end_date' => '22.3.2022',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'user_id' => '2',
                'book_id' => '6',
                'start_date' => '26.3.2022',
                'end_date' => '28.3.2022',
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
