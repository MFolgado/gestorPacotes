<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/12/17
 * Time: 15:11
 */

namespace Blit\Accounts\Seeds;


use Blit\Accounts\Models\Account;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends  Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data =[
            [
                'short_name' => 'Blit',
                'full_name' => 'Blitsoftware',
                'email' => 'marcelo@blitsoft.com.br',
                'cnpj_cpf' => '123123123',
                'active' => 1,
            ]
        ];

        foreach($data as $obj){

            Account::firstOrCreate($obj);

        }



    }

}