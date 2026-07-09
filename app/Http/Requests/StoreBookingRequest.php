<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $room     = $this->route('room');
        $category = $room->category;

        return [
            'purpose' => ['required', 'string', 'max:255'],
            'notes'   => ['nullable', 'string', 'max:1000'],

            'participant_count' => [
                'required', 'integer', 'min:1',
                'max:' . $room->capacity,
            ],

            'date' => [
                'required', 'date',
                'after_or_equal:today',
                'before_or_equal:' . today()->addDays($category->max_booking_days_ahead)->toDateString(),
            ],

            'start_time' => [
                'required', 'date_format:H:i',
                'after_or_equal:' . substr($room->open_time, 0, 5),
                'before:' . substr($room->close_time, 0, 5),
            ],

            'end_time' => [
                'required', 'date_format:H:i',
                'after:start_time',
                'before_or_equal:' . substr($room->close_time, 0, 5),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'date.after_or_equal'       => 'Tanggal tidak boleh sebelum hari ini.',
            'date.before_or_equal'      => 'Tanggal melebihi batas maksimal pemesanan.',
            'start_time.after_or_equal' => 'Jam mulai sebelum jam buka ruangan.',
            'start_time.before'         => 'Jam mulai harus sebelum jam tutup ruangan.',
            'end_time.after'            => 'Jam selesai harus setelah jam mulai.',
            'end_time.before_or_equal'  => 'Jam selesai melebihi jam tutup ruangan.',
            'participant_count.max'     => 'Jumlah peserta melebihi kapasitas ruangan.',
        ];
    }
}
