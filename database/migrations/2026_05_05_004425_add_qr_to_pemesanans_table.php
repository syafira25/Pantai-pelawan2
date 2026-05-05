use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('qr_code')->nullable()->after('bukti_pembayaran');
            $table->timestamp('qr_used_at')->nullable()->after('qr_code');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn(['qr_code', 'qr_used_at']);
        });
    }
};