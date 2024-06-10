<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use NagSamayam\Promocodes\Enums\PromocodeStatus;
use NagSamayam\Promocodes\Enums\PromocodeType;
use NagSamayam\Promocodes\Facades\Promocodes;
use NagSamayam\Promocodes\Models\Promocode;
use Spatie\QueryBuilder\QueryBuilder;

class PromoCodeController extends Controller
{
    public function index()
    {
        Meta::prependTitle('Promo Codes');

        $codes = QueryBuilder::for(Promocode::class)
            ->defaultSort('-created_at')
            ->paginate();

        return view('admin.promo.index', [
            'codes' => $codes,
        ]);
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'count' => 'required|integer|min:1',
            'percent' => 'required|numeric|min:1|max:100',
        ]);

        $codes = Promocodes::mask('KO-****-****-****-EN')
            ->boundToUser()
            ->count($data['count'])
            ->details([
                'percent_off' => $data['percent'],
            ])
            ->usages(1)
            ->expiration(now()->addMonths(6))
            ->createdByAdmin(auth()->user())
            ->type(PromocodeType::PERCENT->value)
            ->create();

        $codes->each(function ($code) {
            tap($code->forceFill([
                'status' => PromocodeStatus::ACTIVE,
                'updated_by_admin_id' => auth()->user()->id,
                'type' => PromocodeType::PERCENT,
            ]))->save();
        });

        return to_route('admin.promo-codes.index')->with('success', 'Done!');
    }

    public function obliterate()
    {
        Promocode::all()->each->delete();

        return to_route('admin.promo-codes.index')->with('success', 'Done');
    }

    public function destroy(int $id)
    {
        $code = Promocode::findOrFail($id);
        $code->delete();

        return to_route('admin.promo-codes.index')->with('success', 'Done');
    }
}
