<?php
// app/Http/Middleware/CheckPermission.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();
        
        // Verifica que el usuario tenga roles asignados
        if (!$user || $user->roles->isEmpty()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Asumiendo que el usuario puede tener múltiples roles y que debes verificar todos
        foreach ($user->roles as $role) {
            // Verificar si el rol tiene el permiso requerido
            $hasPermission = $role->permissions->contains(function ($perm) use ($permission) {
                return $perm->permission === $permission;
            });

            if ($hasPermission) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
