<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TableReservation
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string|null $email
 * @property string $date
 * @property string $time
 * @property int $number_of_people
 * @property string $status
 * @property string|null $table_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereNumberOfPeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereTableNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableReservation whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TableReservation extends Model
{
}
