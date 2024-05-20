<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::all()->each(function (Invoice $invoice): void {
            Comment::factory()->for($invoice, 'commentable')->count(rand(3, 5))->has(Comment::factory(rand(1, 3)))->create();
        });
    }
}
