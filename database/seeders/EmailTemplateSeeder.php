<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailTemplate::create([
            'name' => 'Default Invoice Email Template',
            'content' => "Hi {{name}},\n\nI hope you're doing well.\n\nYour invoice is ready and here is a quick summary:\n\nInvoice number: {{invoice_number}}\n\nAmount due: {{amount}}\n\nDue date: {{due_date}}\n\n For your convenience, We've attached the invoice to this email. Alternatively, you can view and download a PDF version here\n\n{{link}}\n\nIf you have any questions, please don't hesitate to reach out.\n\nBest regards,\n\n{{business_name}}",
        ]);
    }
}
