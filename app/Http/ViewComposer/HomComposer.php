<?

namespace App\Http\ViewComposer;
use App\Model\TypeProduct;
use Illuminate\View\View;


class HomComposer
{
	public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        // truyền dữ liệu ở đây nè
    	$data = TypeProduct::all();
        $view->with('menu', $data);
    }
}