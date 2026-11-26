<?php

namespace App\Exports;

use App\Models\ActivityUpdate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ActivityHistoryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;
    protected $staffId;
    protected $status;

    public function __construct(
        $startDate,
        $endDate,
        $staffId = null,
        $status = null
    ) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->staffId = $staffId;
        $this->status = $status;
    }

    /**
     * Retrieve filtered activity updates.
     */
    public function collection(): Collection
    {
        $query = ActivityUpdate::with(['activity', 'user'])
            ->whereDate('created_at', '>=', $this->startDate)
            ->whereDate('created_at', '<=', $this->endDate);

        if (!empty($this->staffId)) {
            $query->where('user_id', $this->staffId);
        }

        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        return $query->latest()
            ->get()
            ->map(function ($update) {
                return [
                    'activity' => $update->activity->title ?? 'Activity unavailable',

                    'staff_member' => $update->user->name ?? 'User unavailable',

                    'status' => ucfirst($update->status),

                    'update' => $update->update,

                    'remark' => $update->remark ?: 'No remark',

                    'date_time' => $update->created_at
                        ? $update->created_at->format('d M Y, h:i A')
                        : '',
                ];
            });
    }

    /**
     * Excel column headings.
     */
    public function headings(): array
    {
        return [
            'Activity',
            'Staff Member',
            'Status',
            'Update Description',
            'Remark',
            'Date & Time',
        ];
    }
}
