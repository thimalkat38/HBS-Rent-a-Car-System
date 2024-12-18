<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DeleteCompletedBookings extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'bookings:delete-completed';

    /**
     * The console command description.
     */
    protected $description = 'Delete bookings 12 hours after their status is changed to completed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        // Fetch bookings with 'completed' status that are older than 12 hours
        $bookings = Booking::where('status', 'completed')
            ->where('updated_at', '<', $now->subHours(12))
            ->get();

        foreach ($bookings as $booking) {
            // Optional: Remove associated files from storage
            $this->deleteAssociatedFiles($booking);

            // Delete the booking record
            $booking->delete();

            $this->info("Booking ID {$booking->id} deleted successfully.");
        }

        $this->info('Completed bookings deletion task finished.');
    }

    /**
     * Delete associated files for the booking.
     */
    private function deleteAssociatedFiles($booking)
    {
        $files = array_merge(
            $booking->driving_photos ?? [],
            $booking->nic_photos ?? [],
            $booking->deposit_img ?? []
        );

        foreach ($files as $file) {
            if (Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }
    }
}
