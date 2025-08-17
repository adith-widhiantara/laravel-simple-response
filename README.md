# Laravel Response Formatter

Package sederhana untuk memformat response JSON di Laravel dengan struktur yang konsisten.

## Instalasi

Tambahkan package ke project Laravel kamu:

```bash
composer require adithwidhiantara/laravel-response-formatter
````

> Jika belum rilis ke Packagist, gunakan repository lokal atau VCS (GitHub/GitLab) sesuai kebutuhan.

---

## Cara Menggunakan

Import class `ResponseFormatter`:

```php
use Adithwidhiantara\LaravelResponseFormatter\ResponseFormatter;
```

### Success Response

```php
return ResponseFormatter::success(
    data: ['id' => 1, 'name' => 'John Doe'],
    message: 'Data retrieved successfully',
    status: 'success',
    code: \Symfony\Component\HttpFoundation\Response::HTTP_OK
);
```

**Output JSON:**

```json
{
  "status": "success",
  "message": "Data retrieved successfully",
  "data": {
    "id": 1,
    "name": "John Doe"
  }
}
```

---

### Error Response

```php
return ResponseFormatter::error(
    data: null,
    message: 'User not found',
    status: 'error',
    code: \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
);
```

**Output JSON:**

```json
{
  "status": "error",
  "message": "User not found",
  "data": null
}
```

---

## Contoh Penggunaan di Controller

```php
use App\Http\Controllers\Controller;
use Adithwidhiantara\LaravelResponseFormatter\ResponseFormatter;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return ResponseFormatter::error(
                message: 'User not found',
                code: Response::HTTP_NOT_FOUND
            );
        }

        return ResponseFormatter::success(
            data: $user,
            message: 'User retrieved successfully'
        );
    }
}
```

---

## License

MIT License