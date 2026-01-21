namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alert;

class AlertController extends Controller
{
    public function index() {
        $alerts = Alert::orderBy('created_at', 'desc')->get();
        return response()->json($alerts);
    }
}
