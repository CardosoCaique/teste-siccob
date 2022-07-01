<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Session;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(self::calculateAge($request->input('born')) > 21)
            return $next($request);
        else
            return abort(403, 'Idade inválida!');
    }

    /**
	 * calcula a idade do usuário
	 * @param  string $date
	 * @return int
	 */
	public static function calculateAge($date)
	{
		$current_year = new DateTime('now');
		$date = new DateTime('1999-08-02');
		$interval = $current_year->diff($date);
        Session::put('age',  $interval->y);
		return $interval->y;
	}
}
