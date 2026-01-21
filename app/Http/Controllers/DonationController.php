namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Donor;
use JWTAuth;

class DonationController extends Controller
{
    public function index() {
        $user = JWTAuth::parseToken()->authenticate();
        $donor = Donor::where('user_id', $user->id)->first();
        $donations = Donation::where('donor_id', $donor->id)->get();
        return response()->json($donations);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'center_id' => 'required|integer',
            'volume_ml' => 'required|integer'
        ]);

        $user = JWTAuth::parseToken()->authenticate();
        $donor = Donor::where('user_id', $user->id)->first();

        $donation = Donation::create([
            'donor_id' => $donor->id,
            'center_id' => $validated['center_id'],
            'volume_ml' => $validated['volume_ml'],
            'date' => now(),
        ]);

        // Mettre à jour date dernier don et éligibilité
        $donor->last_donation_at = now();
        $donor->eligible = false; // Non éligible pendant 3 mois
        $donor->save();

        return response()->json($donation, 201);
    }
}
