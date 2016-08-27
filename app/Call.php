<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'call';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * Returns total quantity of the calls
     * @return mixed
     */
    public static function getTotalCalls()
    {
        return Call::count();
    }

    /**
     * Returns total quantity of the incoming calls
     * @return mixed
     */
    public static function getIncomingCalls()
    {
        return Call::where('route', 0)
            ->get()
            ->count();
    }

    /**
     * Returns total quantity of the outgoing calls
     * @return mixed
     */
    public static function getOutgoingCalls()
    {
        return Call::where('route', 1)
            ->get()
            ->count();
    }

    /**
     * Returns average call duration
     * @return int
     */
    public static function getAvgDuration()
    {
        $data = self::getModelArray();
        $result = intval(array_sum($data) / count($data));

        return $result;
    }

    /**
     * Returns max call duration
     * @return int
     */
    public static function getMaxDuration()
    {
        $data = self::getModelArray();
        $result = max($data);

        return $result;
    }

    /**
     * Gets an array of models for further analytics
     * @return array
     * @throws \Exception
     */
    private static function getModelArray()
    {
        $model = Call::all();

        if ($model) {
            foreach ($model as $item) {
                $data[] = $item->time_finished - $item->time_connected;
            }

            return $data;
        } else {
            throw new \Exception('No data found');
        }
    }

    /**
     * Most recent number
     * @return mixed
     */
    public static function getMostRecentNum()
    {
        $model = Call::all();
        foreach ($model as $item) {
            $data[] = $item->recipient_num;
        }
        $tmp = array_count_values($data);
        $result = array_keys($tmp, max($tmp));

        return $result[0];
    }
}
