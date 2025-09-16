<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Expense;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            ['title'=>'Obiad', 'type_of_expence'=>'Jedzenie', 'cost'=>67.50],
            ['title'=>'Kino', 'type_of_expence'=>'Rozrywka', 'cost'=>32.00]
        ];

        foreach ($expenses as $expense) 
        {
            Expense::create($expense);
        }
    }
}
