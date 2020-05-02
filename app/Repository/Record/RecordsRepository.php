<?php

namespace App\Repository\Record;

use App\Models\ItemsRecords;
use App\Models\Records;
use App\Repository\InterfaceBasicRepository;
use Illuminate\Support\Facades\DB;

class RecordsRepository implements InterfaceBasicRepository
{
    /**
     * Create the Singleton Pattern
     *
     * @return object
     */
    private static $_instance = null;

    private function __construct()
    {
        // Avoid constructing this class on the outside.
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getAll()
    {
        $data = Records::paginate(20);
        // $data->items_records;
        return $data;
    }

    public function getSpecify($request)
    {
        $data = Records::where('id', '=', $request->id)->get();
        return $data;
    }

    public function insert($request)
    {
        $data = DB::transaction(function () use ($request) {
            $record = Records::create($request->all());
            foreach ($request->items_records as $item) {
                $item['record_id'] = $record->id;
                ItemsRecords::create($item);
            }
            $record = $this->getSpecify($record);
            return $record;
        });
        return $data;
    }

    public function update($request)
    {

    }

    public function delete($request)
    {
        $data = DB::transaction(function () use ($request) {
            ItemsRecords::where('record_id', '=', $request->id)->delete();
            $data = Records::where('id', '=', $request->id)->delete();
            return $data;
        });
        return $data;
    }
}
