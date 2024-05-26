<?php

use App\Http\Controllers\Billing\CardController;
use App\Http\Controllers\Billing\PaymentController as AppPaymentController;
use App\Http\Controllers\Billing\RenewSubscriptionController;
use App\Http\Controllers\Billing\SubscriptionController;
use App\Http\Controllers\Business\BusinessController as BusinessBusinessController;
use App\Http\Controllers\Estimate\Public\PreviewController;
use App\Http\Controllers\Estimate\ActivityController;
use App\Http\Controllers\Estimate\CreateInvoiceController;
use App\Http\Controllers\Estimate\DownloadController;
use App\Http\Controllers\Estimate\DuplicateController;
use App\Http\Controllers\Estimate\EstimateCommentController;
use App\Http\Controllers\Estimate\SendEstimateController;
use App\Http\Controllers\Estimate\StatusController;
use App\Http\Controllers\Onboarding\BusinessController;
use App\Http\Controllers\Payment\PaymentController as PaymentPaymentController;
use App\Http\Controllers\Public\Invoice\PaymentController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController as AppHomeController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\PostController;
use App\Http\Controllers\Public\PreviewInvoiceController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadInvoiceController;
use App\Http\Controllers\DuplicateInvoiceAsRecurringController;
use App\Http\Controllers\DuplicateInvoiceController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\GenerateAvatarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InvoiceActivityController;
use App\Http\Controllers\InvoiceCommentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceStatusController;
use App\Http\Controllers\PaymentController as ControllersPaymentController;
use App\Http\Controllers\RecurringInvoiceController;
use App\Http\Controllers\SendInvoiceController;
use App\Http\Controllers\SendReminderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\RedirectPrelaunch;
use App\Http\Middleware\RedirectToUnfinishedOnboardingStep;
use App\Http\Middleware\SubscribeCustomer;
use App\Http\Middleware\Subscribed;
use Illuminate\Support\Facades\Route;

Route::get('/auth/{social}/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect')
    ->whereIn('social', ['google']);

Route::get('/auth/{social}/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.callback')
    ->whereIn('social', ['google']);

Route::get('/', [AppHomeController::class, 'index'])->name('home.index');

Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');

Route::get('/invoices/{invoice}/preview', [PreviewInvoiceController::class, 'show'])
    ->name('invoices.preview');
Route::get('/invoices/{invoice}/download', [DownloadInvoiceController::class, 'show'])
    ->name('invoices.download');
Route::get('/estimates/{estimate}/download', [DownloadController::class, 'show'])
    ->name('estimates.download');
Route::get('/estimates/{estimate}/preview', [PreviewController::class, 'show'])
    ->name('estimates.preview');

Route::post('/imagess/uploads', [ImageController::class, 'store'])->name('images.store');
Route::get('/imagess/uploads', [ImageController::class, 'show'])->name('images.show');
Route::delete('/imagess/uploads', [ImageController::class, 'destroy'])
    ->name('images.destroy');

Route::get('/avatar/{user}', [GenerateAvatarController::class, 'show'])->name('avatars.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::middleware(['auth', RedirectToUnfinishedOnboardingStep::class, SubscribeCustomer::class, Subscribed::class])
    ->prefix('app')
    ->name('app.')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');

        Route::withoutMiddleware([Subscribed::class, SubscribeCustomer::class])->group(function () {
            Route::prefix('onboarding')
                ->name('onboarding.')
                ->group(function () {
                    Route::resource('business', BusinessController::class)
                        ->only(['create', 'store'])
                        ->withoutMiddleware([RedirectToUnfinishedOnboardingStep::class, RedirectPrelaunch::class]);
                });

            Route::get('/billing/{invoice}/payments/{plan}', [AppPaymentController::class, 'redirect'])
                ->name('billing.payments.redirect');
            Route::get('/billing/payments/callback', [AppPaymentController::class, 'callback'])
                ->name('billing.payments.callback');
            Route::get('/billing/renew', [RenewSubscriptionController::class, 'store'])
                ->name('subscriptions.renew')
                ->middleware(['throttle:6,1']);

            Route::get('/billing/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
            Route::post('/billing/{plan}/subscribe', [SubscriptionController::class, 'store'])->name('subscriptions.store');
        });

        Route::resource('clients', ClientController::class);

        Route::resource('commentables.comments', CommentController::class);

        Route::resource('invoices', InvoiceController::class);
        Route::get('/invoices/{invoice}/send', [SendInvoiceController::class, 'create'])->name('invoices.send');
        Route::post('/invoices/{invoice}/send', [SendInvoiceController::class, 'store'])->name('invoices.send');
        Route::get('/invoices/{invoice}/reminder', [SendReminderController::class, 'create'])->name('invoices.reminder.create');
        Route::post('/invoices/{invoice}/reminder', [SendReminderController::class, 'store'])->name('invoices.reminder.store');
        Route::resource('invoices.comments', InvoiceCommentController::class);
        Route::resource('invoices.activities', InvoiceActivityController::class)->only(['index']);
        Route::post('/invoices/{invoice}/status/{status}', [InvoiceStatusController::class, 'update'])->name('invoices.status.update');
        Route::post('/invoices/{invoice}/duplicate', [DuplicateInvoiceController::class, 'store'])->name('invoices.duplicate');
        Route::post('/invoices/{invoice}/recurring', [DuplicateInvoiceAsRecurringController::class, 'store'])->name('invoices.recurring.store');
        Route::resource('invoices.subscriptions', RecurringInvoiceController::class)->except(['edit']);
        Route::post('/invoices/{invoice}/subscriptions/{subscription}/restore', [RecurringInvoiceController::class, 'restore'])
            ->name('invoices.subscriptions.restore');

        Route::resource('estimates', EstimateController::class);
        Route::post('/estimates/{estimate}/status/{status}', [StatusController::class, 'update'])->name('estimates.status.update');
        Route::resource('estimates.comments', EstimateCommentController::class);
        Route::resource('estimates.activities', ActivityController::class)->only(['index']);
        Route::post('/estimates/{estimate}/duplicate', [DuplicateController::class, 'store'])->name('estimates.duplicate');
        Route::post('/estimates/{estimate}/send', [SendEstimateController::class, 'store'])->name('estimates.send');
        Route::get('/estimates/{estimate}/send', [SendEstimateController::class, 'create'])->name('estimates.send');
        Route::post('/estimates/{estimate}/invoice', [CreateInvoiceController::class, 'store'])->name('estimates.invoice');

        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

        Route::resource('businesses', BusinessBusinessController::class)->only(['edit', 'update', 'destroy']);

        Route::resource('payables.payments', PaymentPaymentController::class);
        Route::resource('payments', ControllersPaymentController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/billing', [BillingController::class, 'edit'])->name('billing.edit');
        Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
    });

Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(base_path('routes/admin.php'));

Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

Route::get('/test', [PaymentController::class, 'test']);
