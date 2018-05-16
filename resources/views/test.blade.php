class TestController extends Controller
{
public function requestTest(Request $request)
{
dd($request->all());
}
}