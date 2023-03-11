<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 投稿一覧
// Route::get('/posts', [App\Http\Controllers\PostController::class, "index"]);
Route::get('/posts', function (Request $request) {
    return [
        "posts" => [
            [
                "id" => 1,
                "title" => "タイトル",
                "images" => [
                    "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAjIAAABaCAMAAACVKkx1AAAAgVBMVEX///8AAACenp67u7vPz8/W1tYUFBQ6OjojIyPt7e2+vr41NTUEBAQcHBzJycmRkZFmZmb09PRzc3Py8vL5+fnn5+ekpKTf399gYGCrq6sQEBCFhYW0tLTb29ubm5tkZGRCQkIuLi6UlJRVVVWIiIhMTEx5eXkoKCg/Pz9ISEh1dXVu/DjdAAARuUlEQVR4nO2d6XbyMA6GCVvZIUDYaQsUaHv/FzjQhcbWK1tSku/MOTP6C0kc57EsS7Jcq4nlNbnLUX7B/+V/XBpfxCSbruHadT0si/Wul5Xe4i/JRrv1enF/QqM5V1896zVc6envwcm81dj9tixVX91dBLqz0ZT15vI58mGQiJuYvnwjk7yp365W6ydxaXdep7vuzHB3LPNZNno7H4aDxxM2nf7q2FI9otn2W2kZMUS62eLlqbP5a9nwsBrvuxocW37LHNkMO6d1NwpiQ/BdiIib2Py9Ymj4qk/i9ryOG6V8lLR34R76cRyJv01z411cAjLL9fYAGzacrJviu7Q68c48ryPKplpkTo9LFuJrHiJH5ibvnyP9E1zJxq+hJ2zOR+GXL1/L7F5CKnd4ehaOSAkySdKvB0dHpci0/i5511sdKmRu8rQu8GXmzangEVvRgC4Zmex5ABtjaJkMmSTp7AI3qRSZS+6aUCOwaJG56VS5leXJaCL4LDdpbwVfv1Rk0rd3WcsuAmikyATXuFUi43TdQHjRn+iRuc0eO8viZC/7Kt9Sj04CJSIzXyhaNl3GbidHJnli21wlMlvnooa4n37EgkySTKL95ks6Dq4jiJxib1IeMsuJqmXXmMWoQCZ54rRWhcjM3ItW2vFvQyYZrnWPaeqfsw0vRMtCZl7XsXyTVXjAaJBJkj2+SYXIbL2resoeMyJz+6KaL/RsecKJ6c1vKQmZ5Qk+OyyD4MJRh8wBL1mqQybz14UrZZeZkUk+xJ8o9bkWCqu171IOMr2rqWWD0OSkQyaZQG1aHTJ0+LZ0fWZHJmkHtcCfLD/MjwgYNKUgY9J+XzLmLQAlMskF3aQyZFI6SCa6TiuATHIQ4dkK+u4iws+zZSAzLtCyLf/CSmTgKK8MmTq9rK1z0BZBJkkEzxoVegDv0C4BmSLEBFYaamSm4E6VIYM83Dz+SIohc43qmf2w0AN472RxZOyz0rdcGGbUyKCRVxUya3ihKmpQDJlkGHnYvuD9b5YmYwMXRsb0URxhMgf0yJxLal38pWd4gQjNKU6KftJ+kJlU3XtEqtIyIz8SbhDsnNIjA6yZipBhzARV3xFk2sO8xJs5Dd39Er18EHGkVWXLzA7RpsWZakMNSJGJ9ifVVxSZzjAq8dfmfAqaVCuCjN8Ly179cg71WyC2dgxc1p+Me78eiWy3nWB1x6+yiyEzDyz8h6ft+id3rtvcvb0ElMYAPZMik/91hIbRmZhFBJknxdux0gTP/r67wpohXwotgrqj44HvN3bZxDYwSSY73+m+XAMwA5H5Ysjwpu9q13RDovNW75P9N9KxYWRqtR1VrEOirggyfcXbscJH0xSpViJk7jJiPeuvDKEp55DpM8GG5sr93yYUmiyEDAfz5oTfpbvlphTQ1TFkaq0DuQ2xiipBphlIPpHfRYxMrbbgsheYiZAbyRdeCa4dyoLB7ELIMG+y4l++xQQ9rvRlosgAQ4V4RipBJpTgJo8zK5CppZxtAhlYYsOW6mDnETnOwvliRZDBzonBOpgGMMKm4yf5YxyZGpmDJ/6jq0BmCV/gR87ixHENMrXaHs810BGKJ7JpLLf+4cmJxOQLILOEOb79mCs7w29ELhMgs/P/8eF3SxXIhNev4hwIHTK1DC9swEUt+Me3eD5P9j3hxhRlAWTeUMue4kHW7gpd+OJ/bQEyxCl09cd4BchE/EXv0lQrJTK1FKL6Qf8I503RhDlbxTJS7mJHpotaBhywQGBUyh+eAmRaZJL7B8jEQmrS4KQWGcajQQyUFnKEPcva1D0J8t7tyCAlcxZejFap/ngRINMkf6kemSyWfXgS3kiNDLYESGYXUkbigGlXkFVhRga1H6x7mJahuclrrWRi8v9Bdi2Wj0zIr/olG6Ga0SMDnRod/yOD/6z025tDrbAig5ZL8vTXDGhPL6gnQIZsaehXbv7O45EvLjTviQEZ2OmeS4ssCW6i3pUQFCsyczC3aHZm9ejlni8zjsycmDLnypGRpHrIMjotyKAZ3VvWA/2t3JMQEysyGW2ZLl8a9L1recWRoW7Byl153WCc8EeCIeaHmJABI83VIcAl/lFe5YgvsSIDEhnlO/Tv0qUa3u3qKDJgpx0x98tGBql9KqKJwIQMUjPjSAPVm/IiYkWGOpaU2dIIOmdaocg4LeuClUH1YUkQIwP2sCgHwoYM8NM5S02qeYHnppgYkemSvpMuFB6SHsjbOUYARWba6D1kTK9GG3xKRgZkbE1n1JV/kKgZGzIgGrDJmdtg44OhjklYjMjQvpNN4Hmh5r+jYoGXdbD5FRxLpomU5SIzB7GOJbLKJMXzjMgAaya3UAUmZqkL7LsYkaHaWD9jUt+t4wUzJHLSwU2QUe4ccQXkb95W1CloieBmRmRAt+Rcu3Qoa+2FuNiQmdM4huHZZMw+5UdERenih5cJI6uoVx1MCnfrCVgzAjVjRAZ4N3LrRGrK6AvfxMSGTEbCHe+GZ5NojePJ1CMDlmyqdPHY3ApMzy9KgV9SsG3aiAwANLeBi3hlCmlVLDZkluRzWowskniyybuP//3WtxgywEv2TSmIVMbdZ1ZkKLjnPx8oSXqTRv0UYkOGNlu4sdyVYEdrkekgO69MZJp0hX36pnRPm/oUjRpYkZmTZ/0t0OYk8Pciu6lGbMiQ+BhTqyMiJCicDzlokYH2d5nIgND97zOBgy26HLAiQwfa8DFes4PmndLjWCr5hYUNGfIlPkzIEIsobzUqkcGbB0tEBuRvnlL+t9fYy5uRIf2yeZiAVN2FvIow4wlL3oi2IUNcKitTHIOsu/IvqNUyMMRVIjIg0f1vHqVqZhAL65uRoa7DBzJ07gzZmP8UGeLsR6ZnXIjZmM8bUJu/aGFbHjKgf3PbKknFbZC67okZGWqFP5aKIzLVh8xwBTL5adaGDPnWujoZv0JiaNMiyLjO428pDxngfMmN4DlYTUVyIMzIUO9QAJn/Gi1DfOTCtCJPSCz6sxAyoNNLQ4aUxvPye4BjOJLRaUbm4F84eMDZIhNTyKf4T7VMSbYMMQ/yysqADMmwKg8ZkGnhfo0D/UPY8WBGhsyBw4D5G1L/CmTybStrxWTyGBFtnp9aDMhQNVwaMuDvLp/gSeHZurxF9tW4yFYgU3yRTdSwzS9Deq2IX+Yu8XTxkAS6FygZb/kKqhQNg9aMFRm6oP/zcMzJTUMVrBXI5O9Skvd3YMpIJi3LawkLMiT9oSRkUpj14EqcKlesyNC8u9yuQeLpegp8GAUy+ctsyOzJfGoJGNAm5w1zEzJDr4dKQgakR9LlGdhsHrLwrMjQbMTcBPhCfgy4h+TIOFWajJFsEv6yrLLJustJxAzm/qat+gqWx/J2OZSDzJwmiYNJB2SmgmX/Q4zI0CSC/FOovzGQ0SFHxnGT2pCZEcN1I3pfV4jL1LGIounifh2dL/F8iipk2GwksIIG/+1SNROqamVEBmx/y+lm+r6vvDEjR8ZZVhiz8miITr9kovstncxmwT4mkHTQdmcm0oVX//jVnLDWKtiJgiZikNEZ2NplRAY8JNf1M/orb4PLkXHuYUSG5u0KN4rnhGaxOsarYLck6j83glxK7i+oOgoDWkuqZsj2zT8xIkO3hF9zv6bU48hncoqRccehERlaXkCfy0NL5zlJhxJkQIjO9bmWgQzIWmUqagQjl77YkAGDxBloVP3jeqd3ESPjzvbWfUwHcl9tXh6YlCP7mMBNljTtyfm9DGRQ1gM2EEB+P18B1IQMXXd414G1HVvAWoyMO4NYkaHR/o0yzERdHW4mmwgZMLCdn8tABljZ3NcF2/FYNWNCBiiZg/PBlqDYFXfj9DL15HOKamV5esqKDNARuiPpwXBwe1eGDL2No6pKQAaojiv3X9KbgUIdFmRQcRuv20ENK02tYxoLJ31mRWZG7ayOxp2XAleHC7MMGWpUOaZaCcgAA4VP0gQfjCPBggxwQvupXMitEHIPebI80Mu9aLi5vgxQkfJqlLBvvcxmGTIpMWacni+OzJ4ug058F4F9K9wYNyCDClSR2nzgP4p9iaict/e6ZmRGYEe7fJMtqq3jzfoyZGgmrDPqiiMDUqtCdXRAbS/GMaJHBvoliXMDVcDpSJezqBDgpwelvVYeqsUqLX4D5nxaPNyoZZzprTAyYPcsa8l8vRn9P+MYUSMDi7O2yd/Q1JIcZEYDOumc1GewIwOr0cu2c8Jiy/4iXYYMLQ7vtL8wMmDMBp2WKV1fMY4RLTL4yFfQGFjA/V2SnfKMRjJJLixQ9xeWo5fMmi20kiMZNzJk6Lhwfi6KTJe+5DXcQWAliOdrJTJIAdxeB+Q2oDqEt/6NV4yChZzpvFoAGVSEK3gm7Y/gSlAkSVWEDNjU7vxeFBlgc8V26ANrBo5wFTJz5uwH6D/FlYk3kVKGS3z+C91uWQCZOU3OuMtn5Aa4CirJp5MhQy3Cfvh3HTIpUDIxqwBQBjNDNMg0mfN1OvDfILX9SyahPLgGvgjMqkWOvWDOf3gPTU4tpj4hNYIkyMypDnZ9EAWRAQoxmhgEIoOwqpUcGQ4YtjwhW9HvyEAzH3FlI4FqKnS4Dp78kuTMQdPkDr8C+8QEyABb08tKKIgMKAEfNyNBqhWaE6TI9KZsPXM2egRPifh6/S1q/+iFO2EKHZpIkBkqkOmyx71PEDTNC3eCVxv4LgTIgJ7xkpqKIWNRMrdeodY9GofkX2C1mY3w5P8t/IERtCLyn7yvW9lfECNd7rmBn+R3e+eEekg0id+tQEH/026ZC69krIK5C1qbx5DJdmhl4EVcaIqVIniagiYfe77Q68A3AGYqQea8y9+2sa4ft4dAn+Hvyb23I6+TcX13f8Lz2yT4CGgxU2RW9QUj9R3pb7z0+5H25Pi8WDd2i+fIy0MFS5G5/FXkbNS3+Mg5z5lIum6wbZCPzkEAPE8DX5A9Adx/HUoq8DS4N45J0AcWPWohETwBewegH5YV2j3x85jjgrdaoh0G0Q7te58GjTby2X35vVhSSRydVydTM0WPVo+kQYZOMxQKPRD4S3TI0G3GXdaaF8sQW5SmTSn+yCtytPpe9m9yVAlsOg1lFkSGNX1/ZBaygkTCbYHSIQPWC13dDahwNaYtyLxGj72QyM+10nEKLGLgeCPTSDFk4nUT0HJSI+wGWCUygG18xKRcOHeEBRliixZARv58mkQFFNTB/08hZCQnLDGHeAqlzxrXSmSQU0qowBlh/X6Wyg9k6BVAhnHRAwHpiGBW8HEugozgbNEazHMXC3dqe02NDIywZKx7JiqBYJkemQ19TTsyYEcQJ2CDG1hsvXifuQAy0iw7OzOrgMdSi0yC+M6s0+Y14FpQIzMACsuOTMDBRYQuhwQbWczIDBVHcgWdILz4WVWOqJGB3p1UrsXz8hJyG6qRQS0zI0MrtQQEbHADYX7Py2FF5iw7VO5HRobHXMNMqpF5x4bXTm95DML6VYsMdOWbkdENT+BVA58qi/1BImNlvTB8KnlIcDncP1Ejwzkdl1o/QCznR4nMFupSKzLgTLqQkOUQVDNuRqcJmaBeZqQnc0n+yDW6hVGPDC1I9yM7TSccomeXqpAZMiBbkUHp7CGhZlRKe8PdtWNApt8wVbHsxqMHD7nEpz09MnxeRxY7qD7Xsvho0SBz5dpkRSYQCYYyoeMIhMGd1bgWmc1Zfqa0L/M3kfNsuJIoMQMygcMKZ8+SjuhvJfOxHJkOb+AbkdEqGRR9A5kh7byVoENmc7EDc5dsEXXsDbayA2UNyASPqu3uYubWx0I2H4uRmZqTABhBpRJjAor8glSrvJpRIDP82HVNU1Je0mwbUDXt12epXW1BJhwRS7Pjgbvp5vC5lLZMhszgYxTqTBsyOBE+LGAcgH/lXl6ITH9y3JV2ptJoPEHY9LcLRUVVUHw/KoOoibRcv538Lz48bxeao7QFyAwn9cgdbciolhg/AsZReA9UBJlB5+k0XTT3WbnHic6z/Wh8emRHbg6r7a6lq8Dbeu2rpSOpWDVb7nvHl3N/OGgfPlbbRmupHCtBZNqvq7d1cxnV1iZk/gMEvRcpf7yaiQAAAABJRU5ErkJggg=="
                ],
                "isBookmark" => true,
                "date" => "2023-03-11T12:34:56+09:00"
            ]
        ]
    ];
});

// 投稿
Route::post('/posts', [App\Http\Controllers\PostController::class, "store"]);
// Route::post('/posts', function (Request $request) {
//     return [
//         "postId" => 1
//     ];
// });

// 投稿詳細
// Route::get('/posts/{postId}', [App\Http\Controllers\PostController::class, "show"]);
Route::get('/posts/{postId}', function (Request $request) {
    return [
        "id" => 1,
        "title" => "タイトル",
        "images" => [
            [
                "base64" => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAjIAAABaCAMAAACVKkx1AAAAgVBMVEX///8AAACenp67u7vPz8/W1tYUFBQ6OjojIyPt7e2+vr41NTUEBAQcHBzJycmRkZFmZmb09PRzc3Py8vL5+fnn5+ekpKTf399gYGCrq6sQEBCFhYW0tLTb29ubm5tkZGRCQkIuLi6UlJRVVVWIiIhMTEx5eXkoKCg/Pz9ISEh1dXVu/DjdAAARuUlEQVR4nO2d6XbyMA6GCVvZIUDYaQsUaHv/FzjQhcbWK1tSku/MOTP6C0kc57EsS7Jcq4nlNbnLUX7B/+V/XBpfxCSbruHadT0si/Wul5Xe4i/JRrv1enF/QqM5V1896zVc6envwcm81dj9tixVX91dBLqz0ZT15vI58mGQiJuYvnwjk7yp365W6ydxaXdep7vuzHB3LPNZNno7H4aDxxM2nf7q2FI9otn2W2kZMUS62eLlqbP5a9nwsBrvuxocW37LHNkMO6d1NwpiQ/BdiIib2Py9Ymj4qk/i9ryOG6V8lLR34R76cRyJv01z411cAjLL9fYAGzacrJviu7Q68c48ryPKplpkTo9LFuJrHiJH5ibvnyP9E1zJxq+hJ2zOR+GXL1/L7F5CKnd4ehaOSAkySdKvB0dHpci0/i5511sdKmRu8rQu8GXmzangEVvRgC4Zmex5ABtjaJkMmSTp7AI3qRSZS+6aUCOwaJG56VS5leXJaCL4LDdpbwVfv1Rk0rd3WcsuAmikyATXuFUi43TdQHjRn+iRuc0eO8viZC/7Kt9Sj04CJSIzXyhaNl3GbidHJnli21wlMlvnooa4n37EgkySTKL95ks6Dq4jiJxib1IeMsuJqmXXmMWoQCZ54rRWhcjM3ItW2vFvQyYZrnWPaeqfsw0vRMtCZl7XsXyTVXjAaJBJkj2+SYXIbL2resoeMyJz+6KaL/RsecKJ6c1vKQmZ5Qk+OyyD4MJRh8wBL1mqQybz14UrZZeZkUk+xJ8o9bkWCqu171IOMr2rqWWD0OSkQyaZQG1aHTJ0+LZ0fWZHJmkHtcCfLD/MjwgYNKUgY9J+XzLmLQAlMskF3aQyZFI6SCa6TiuATHIQ4dkK+u4iws+zZSAzLtCyLf/CSmTgKK8MmTq9rK1z0BZBJkkEzxoVegDv0C4BmSLEBFYaamSm4E6VIYM83Dz+SIohc43qmf2w0AN472RxZOyz0rdcGGbUyKCRVxUya3ihKmpQDJlkGHnYvuD9b5YmYwMXRsb0URxhMgf0yJxLal38pWd4gQjNKU6KftJ+kJlU3XtEqtIyIz8SbhDsnNIjA6yZipBhzARV3xFk2sO8xJs5Dd39Er18EHGkVWXLzA7RpsWZakMNSJGJ9ifVVxSZzjAq8dfmfAqaVCuCjN8Ly179cg71WyC2dgxc1p+Me78eiWy3nWB1x6+yiyEzDyz8h6ft+id3rtvcvb0ElMYAPZMik/91hIbRmZhFBJknxdux0gTP/r67wpohXwotgrqj44HvN3bZxDYwSSY73+m+XAMwA5H5Ysjwpu9q13RDovNW75P9N9KxYWRqtR1VrEOirggyfcXbscJH0xSpViJk7jJiPeuvDKEp55DpM8GG5sr93yYUmiyEDAfz5oTfpbvlphTQ1TFkaq0DuQ2xiipBphlIPpHfRYxMrbbgsheYiZAbyRdeCa4dyoLB7ELIMG+y4l++xQQ9rvRlosgAQ4V4RipBJpTgJo8zK5CppZxtAhlYYsOW6mDnETnOwvliRZDBzonBOpgGMMKm4yf5YxyZGpmDJ/6jq0BmCV/gR87ixHENMrXaHs810BGKJ7JpLLf+4cmJxOQLILOEOb79mCs7w29ELhMgs/P/8eF3SxXIhNev4hwIHTK1DC9swEUt+Me3eD5P9j3hxhRlAWTeUMue4kHW7gpd+OJ/bQEyxCl09cd4BchE/EXv0lQrJTK1FKL6Qf8I503RhDlbxTJS7mJHpotaBhywQGBUyh+eAmRaZJL7B8jEQmrS4KQWGcajQQyUFnKEPcva1D0J8t7tyCAlcxZejFap/ngRINMkf6kemSyWfXgS3kiNDLYESGYXUkbigGlXkFVhRga1H6x7mJahuclrrWRi8v9Bdi2Wj0zIr/olG6Ga0SMDnRod/yOD/6z025tDrbAig5ZL8vTXDGhPL6gnQIZsaehXbv7O45EvLjTviQEZ2OmeS4ssCW6i3pUQFCsyczC3aHZm9ejlni8zjsycmDLnypGRpHrIMjotyKAZ3VvWA/2t3JMQEysyGW2ZLl8a9L1recWRoW7Byl153WCc8EeCIeaHmJABI83VIcAl/lFe5YgvsSIDEhnlO/Tv0qUa3u3qKDJgpx0x98tGBql9KqKJwIQMUjPjSAPVm/IiYkWGOpaU2dIIOmdaocg4LeuClUH1YUkQIwP2sCgHwoYM8NM5S02qeYHnppgYkemSvpMuFB6SHsjbOUYARWba6D1kTK9GG3xKRgZkbE1n1JV/kKgZGzIgGrDJmdtg44OhjklYjMjQvpNN4Hmh5r+jYoGXdbD5FRxLpomU5SIzB7GOJbLKJMXzjMgAaya3UAUmZqkL7LsYkaHaWD9jUt+t4wUzJHLSwU2QUe4ccQXkb95W1CloieBmRmRAt+Rcu3Qoa+2FuNiQmdM4huHZZMw+5UdERenih5cJI6uoVx1MCnfrCVgzAjVjRAZ4N3LrRGrK6AvfxMSGTEbCHe+GZ5NojePJ1CMDlmyqdPHY3ApMzy9KgV9SsG3aiAwANLeBi3hlCmlVLDZkluRzWowskniyybuP//3WtxgywEv2TSmIVMbdZ1ZkKLjnPx8oSXqTRv0UYkOGNlu4sdyVYEdrkekgO69MZJp0hX36pnRPm/oUjRpYkZmTZ/0t0OYk8Pciu6lGbMiQ+BhTqyMiJCicDzlokYH2d5nIgND97zOBgy26HLAiQwfa8DFes4PmndLjWCr5hYUNGfIlPkzIEIsobzUqkcGbB0tEBuRvnlL+t9fYy5uRIf2yeZiAVN2FvIow4wlL3oi2IUNcKitTHIOsu/IvqNUyMMRVIjIg0f1vHqVqZhAL65uRoa7DBzJ07gzZmP8UGeLsR6ZnXIjZmM8bUJu/aGFbHjKgf3PbKknFbZC67okZGWqFP5aKIzLVh8xwBTL5adaGDPnWujoZv0JiaNMiyLjO428pDxngfMmN4DlYTUVyIMzIUO9QAJn/Gi1DfOTCtCJPSCz6sxAyoNNLQ4aUxvPye4BjOJLRaUbm4F84eMDZIhNTyKf4T7VMSbYMMQ/yysqADMmwKg8ZkGnhfo0D/UPY8WBGhsyBw4D5G1L/CmTybStrxWTyGBFtnp9aDMhQNVwaMuDvLp/gSeHZurxF9tW4yFYgU3yRTdSwzS9Deq2IX+Yu8XTxkAS6FygZb/kKqhQNg9aMFRm6oP/zcMzJTUMVrBXI5O9Skvd3YMpIJi3LawkLMiT9oSRkUpj14EqcKlesyNC8u9yuQeLpegp8GAUy+ctsyOzJfGoJGNAm5w1zEzJDr4dKQgakR9LlGdhsHrLwrMjQbMTcBPhCfgy4h+TIOFWajJFsEv6yrLLJustJxAzm/qat+gqWx/J2OZSDzJwmiYNJB2SmgmX/Q4zI0CSC/FOovzGQ0SFHxnGT2pCZEcN1I3pfV4jL1LGIounifh2dL/F8iipk2GwksIIG/+1SNROqamVEBmx/y+lm+r6vvDEjR8ZZVhiz8miITr9kovstncxmwT4mkHTQdmcm0oVX//jVnLDWKtiJgiZikNEZ2NplRAY8JNf1M/orb4PLkXHuYUSG5u0KN4rnhGaxOsarYLck6j83glxK7i+oOgoDWkuqZsj2zT8xIkO3hF9zv6bU48hncoqRccehERlaXkCfy0NL5zlJhxJkQIjO9bmWgQzIWmUqagQjl77YkAGDxBloVP3jeqd3ESPjzvbWfUwHcl9tXh6YlCP7mMBNljTtyfm9DGRQ1gM2EEB+P18B1IQMXXd414G1HVvAWoyMO4NYkaHR/o0yzERdHW4mmwgZMLCdn8tABljZ3NcF2/FYNWNCBiiZg/PBlqDYFXfj9DL15HOKamV5esqKDNARuiPpwXBwe1eGDL2No6pKQAaojiv3X9KbgUIdFmRQcRuv20ENK02tYxoLJ31mRWZG7ayOxp2XAleHC7MMGWpUOaZaCcgAA4VP0gQfjCPBggxwQvupXMitEHIPebI80Mu9aLi5vgxQkfJqlLBvvcxmGTIpMWacni+OzJ4ug058F4F9K9wYNyCDClSR2nzgP4p9iaict/e6ZmRGYEe7fJMtqq3jzfoyZGgmrDPqiiMDUqtCdXRAbS/GMaJHBvoliXMDVcDpSJezqBDgpwelvVYeqsUqLX4D5nxaPNyoZZzprTAyYPcsa8l8vRn9P+MYUSMDi7O2yd/Q1JIcZEYDOumc1GewIwOr0cu2c8Jiy/4iXYYMLQ7vtL8wMmDMBp2WKV1fMY4RLTL4yFfQGFjA/V2SnfKMRjJJLixQ9xeWo5fMmi20kiMZNzJk6Lhwfi6KTJe+5DXcQWAliOdrJTJIAdxeB+Q2oDqEt/6NV4yChZzpvFoAGVSEK3gm7Y/gSlAkSVWEDNjU7vxeFBlgc8V26ANrBo5wFTJz5uwH6D/FlYk3kVKGS3z+C91uWQCZOU3OuMtn5Aa4CirJp5MhQy3Cfvh3HTIpUDIxqwBQBjNDNMg0mfN1OvDfILX9SyahPLgGvgjMqkWOvWDOf3gPTU4tpj4hNYIkyMypDnZ9EAWRAQoxmhgEIoOwqpUcGQ4YtjwhW9HvyEAzH3FlI4FqKnS4Dp78kuTMQdPkDr8C+8QEyABb08tKKIgMKAEfNyNBqhWaE6TI9KZsPXM2egRPifh6/S1q/+iFO2EKHZpIkBkqkOmyx71PEDTNC3eCVxv4LgTIgJ7xkpqKIWNRMrdeodY9GofkX2C1mY3w5P8t/IERtCLyn7yvW9lfECNd7rmBn+R3e+eEekg0id+tQEH/026ZC69krIK5C1qbx5DJdmhl4EVcaIqVIniagiYfe77Q68A3AGYqQea8y9+2sa4ft4dAn+Hvyb23I6+TcX13f8Lz2yT4CGgxU2RW9QUj9R3pb7z0+5H25Pi8WDd2i+fIy0MFS5G5/FXkbNS3+Mg5z5lIum6wbZCPzkEAPE8DX5A9Adx/HUoq8DS4N45J0AcWPWohETwBewegH5YV2j3x85jjgrdaoh0G0Q7te58GjTby2X35vVhSSRydVydTM0WPVo+kQYZOMxQKPRD4S3TI0G3GXdaaF8sQW5SmTSn+yCtytPpe9m9yVAlsOg1lFkSGNX1/ZBaygkTCbYHSIQPWC13dDahwNaYtyLxGj72QyM+10nEKLGLgeCPTSDFk4nUT0HJSI+wGWCUygG18xKRcOHeEBRliixZARv58mkQFFNTB/08hZCQnLDGHeAqlzxrXSmSQU0qowBlh/X6Wyg9k6BVAhnHRAwHpiGBW8HEugozgbNEazHMXC3dqe02NDIywZKx7JiqBYJkemQ19TTsyYEcQJ2CDG1hsvXifuQAy0iw7OzOrgMdSi0yC+M6s0+Y14FpQIzMACsuOTMDBRYQuhwQbWczIDBVHcgWdILz4WVWOqJGB3p1UrsXz8hJyG6qRQS0zI0MrtQQEbHADYX7Py2FF5iw7VO5HRobHXMNMqpF5x4bXTm95DML6VYsMdOWbkdENT+BVA58qi/1BImNlvTB8KnlIcDncP1Ejwzkdl1o/QCznR4nMFupSKzLgTLqQkOUQVDNuRqcJmaBeZqQnc0n+yDW6hVGPDC1I9yM7TSccomeXqpAZMiBbkUHp7CGhZlRKe8PdtWNApt8wVbHsxqMHD7nEpz09MnxeRxY7qD7Xsvho0SBz5dpkRSYQCYYyoeMIhMGd1bgWmc1Zfqa0L/M3kfNsuJIoMQMygcMKZ8+SjuhvJfOxHJkOb+AbkdEqGRR9A5kh7byVoENmc7EDc5dsEXXsDbayA2UNyASPqu3uYubWx0I2H4uRmZqTABhBpRJjAor8glSrvJpRIDP82HVNU1Je0mwbUDXt12epXW1BJhwRS7Pjgbvp5vC5lLZMhszgYxTqTBsyOBE+LGAcgH/lXl6ITH9y3JV2ptJoPEHY9LcLRUVVUHw/KoOoibRcv538Lz48bxeao7QFyAwn9cgdbciolhg/AsZReA9UBJlB5+k0XTT3WbnHic6z/Wh8emRHbg6r7a6lq8Dbeu2rpSOpWDVb7nvHl3N/OGgfPlbbRmupHCtBZNqvq7d1cxnV1iZk/gMEvRcpf7yaiQAAAABJRU5ErkJggg==",
                "isLike" => true,
                "likeCount" => 1
            ],
            [
                "base64" => "data:image/png;base64,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",
                "isLike" => false,
                "likeCount" => 2
            ],
        ],
        "isBookmark" => true,
        "bookmarkCount" => 1,
        "tags" => [
            "タグ1",
            "タグ2",
        ],
        "date" => "2023-03-11T12:34:56+09:00"
    ];
});

Route::post('/posts/{postId}/bookmark', [App\Http\Controllers\updateBookmarkController::class, 'execute']);
// Route::post('/posts/{postId}/bookmark', function (Request $request) {
//     return [
//         "isBookmark" => true,
//     ];
// });

// いいね切り替え
Route::post('/images/{imageId}/like', [App\Http\Controllers\updateLikeController::class, 'execute']);
// Route::post('/images/{imageId}/like', function (Request $request) {
//     return [
//         "isLike" => true,
//         "likeCount" => 1
//     ];
// });

// ハッシュタグ一覧
// Route::get('/tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/tags', function (Request $request) {
    return [
        "tags" => [
            [
                "tag" => "タグ1",
                "image" => "data:image/png;base64,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",
            ],
            [
                "tag" => "タグ2",
                "image" => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAjIAAABaCAMAAACVKkx1AAAAgVBMVEX///8AAACenp67u7vPz8/W1tYUFBQ6OjojIyPt7e2+vr41NTUEBAQcHBzJycmRkZFmZmb09PRzc3Py8vL5+fnn5+ekpKTf399gYGCrq6sQEBCFhYW0tLTb29ubm5tkZGRCQkIuLi6UlJRVVVWIiIhMTEx5eXkoKCg/Pz9ISEh1dXVu/DjdAAARuUlEQVR4nO2d6XbyMA6GCVvZIUDYaQsUaHv/FzjQhcbWK1tSku/MOTP6C0kc57EsS7Jcq4nlNbnLUX7B/+V/XBpfxCSbruHadT0si/Wul5Xe4i/JRrv1enF/QqM5V1896zVc6envwcm81dj9tixVX91dBLqz0ZT15vI58mGQiJuYvnwjk7yp365W6ydxaXdep7vuzHB3LPNZNno7H4aDxxM2nf7q2FI9otn2W2kZMUS62eLlqbP5a9nwsBrvuxocW37LHNkMO6d1NwpiQ/BdiIib2Py9Ymj4qk/i9ryOG6V8lLR34R76cRyJv01z411cAjLL9fYAGzacrJviu7Q68c48ryPKplpkTo9LFuJrHiJH5ibvnyP9E1zJxq+hJ2zOR+GXL1/L7F5CKnd4ehaOSAkySdKvB0dHpci0/i5511sdKmRu8rQu8GXmzangEVvRgC4Zmex5ABtjaJkMmSTp7AI3qRSZS+6aUCOwaJG56VS5leXJaCL4LDdpbwVfv1Rk0rd3WcsuAmikyATXuFUi43TdQHjRn+iRuc0eO8viZC/7Kt9Sj04CJSIzXyhaNl3GbidHJnli21wlMlvnooa4n37EgkySTKL95ks6Dq4jiJxib1IeMsuJqmXXmMWoQCZ54rRWhcjM3ItW2vFvQyYZrnWPaeqfsw0vRMtCZl7XsXyTVXjAaJBJkj2+SYXIbL2resoeMyJz+6KaL/RsecKJ6c1vKQmZ5Qk+OyyD4MJRh8wBL1mqQybz14UrZZeZkUk+xJ8o9bkWCqu171IOMr2rqWWD0OSkQyaZQG1aHTJ0+LZ0fWZHJmkHtcCfLD/MjwgYNKUgY9J+XzLmLQAlMskF3aQyZFI6SCa6TiuATHIQ4dkK+u4iws+zZSAzLtCyLf/CSmTgKK8MmTq9rK1z0BZBJkkEzxoVegDv0C4BmSLEBFYaamSm4E6VIYM83Dz+SIohc43qmf2w0AN472RxZOyz0rdcGGbUyKCRVxUya3ihKmpQDJlkGHnYvuD9b5YmYwMXRsb0URxhMgf0yJxLal38pWd4gQjNKU6KftJ+kJlU3XtEqtIyIz8SbhDsnNIjA6yZipBhzARV3xFk2sO8xJs5Dd39Er18EHGkVWXLzA7RpsWZakMNSJGJ9ifVVxSZzjAq8dfmfAqaVCuCjN8Ly179cg71WyC2dgxc1p+Me78eiWy3nWB1x6+yiyEzDyz8h6ft+id3rtvcvb0ElMYAPZMik/91hIbRmZhFBJknxdux0gTP/r67wpohXwotgrqj44HvN3bZxDYwSSY73+m+XAMwA5H5Ysjwpu9q13RDovNW75P9N9KxYWRqtR1VrEOirggyfcXbscJH0xSpViJk7jJiPeuvDKEp55DpM8GG5sr93yYUmiyEDAfz5oTfpbvlphTQ1TFkaq0DuQ2xiipBphlIPpHfRYxMrbbgsheYiZAbyRdeCa4dyoLB7ELIMG+y4l++xQQ9rvRlosgAQ4V4RipBJpTgJo8zK5CppZxtAhlYYsOW6mDnETnOwvliRZDBzonBOpgGMMKm4yf5YxyZGpmDJ/6jq0BmCV/gR87ixHENMrXaHs810BGKJ7JpLLf+4cmJxOQLILOEOb79mCs7w29ELhMgs/P/8eF3SxXIhNev4hwIHTK1DC9swEUt+Me3eD5P9j3hxhRlAWTeUMue4kHW7gpd+OJ/bQEyxCl09cd4BchE/EXv0lQrJTK1FKL6Qf8I503RhDlbxTJS7mJHpotaBhywQGBUyh+eAmRaZJL7B8jEQmrS4KQWGcajQQyUFnKEPcva1D0J8t7tyCAlcxZejFap/ngRINMkf6kemSyWfXgS3kiNDLYESGYXUkbigGlXkFVhRga1H6x7mJahuclrrWRi8v9Bdi2Wj0zIr/olG6Ga0SMDnRod/yOD/6z025tDrbAig5ZL8vTXDGhPL6gnQIZsaehXbv7O45EvLjTviQEZ2OmeS4ssCW6i3pUQFCsyczC3aHZm9ejlni8zjsycmDLnypGRpHrIMjotyKAZ3VvWA/2t3JMQEysyGW2ZLl8a9L1recWRoW7Byl153WCc8EeCIeaHmJABI83VIcAl/lFe5YgvsSIDEhnlO/Tv0qUa3u3qKDJgpx0x98tGBql9KqKJwIQMUjPjSAPVm/IiYkWGOpaU2dIIOmdaocg4LeuClUH1YUkQIwP2sCgHwoYM8NM5S02qeYHnppgYkemSvpMuFB6SHsjbOUYARWba6D1kTK9GG3xKRgZkbE1n1JV/kKgZGzIgGrDJmdtg44OhjklYjMjQvpNN4Hmh5r+jYoGXdbD5FRxLpomU5SIzB7GOJbLKJMXzjMgAaya3UAUmZqkL7LsYkaHaWD9jUt+t4wUzJHLSwU2QUe4ccQXkb95W1CloieBmRmRAt+Rcu3Qoa+2FuNiQmdM4huHZZMw+5UdERenih5cJI6uoVx1MCnfrCVgzAjVjRAZ4N3LrRGrK6AvfxMSGTEbCHe+GZ5NojePJ1CMDlmyqdPHY3ApMzy9KgV9SsG3aiAwANLeBi3hlCmlVLDZkluRzWowskniyybuP//3WtxgywEv2TSmIVMbdZ1ZkKLjnPx8oSXqTRv0UYkOGNlu4sdyVYEdrkekgO69MZJp0hX36pnRPm/oUjRpYkZmTZ/0t0OYk8Pciu6lGbMiQ+BhTqyMiJCicDzlokYH2d5nIgND97zOBgy26HLAiQwfa8DFes4PmndLjWCr5hYUNGfIlPkzIEIsobzUqkcGbB0tEBuRvnlL+t9fYy5uRIf2yeZiAVN2FvIow4wlL3oi2IUNcKitTHIOsu/IvqNUyMMRVIjIg0f1vHqVqZhAL65uRoa7DBzJ07gzZmP8UGeLsR6ZnXIjZmM8bUJu/aGFbHjKgf3PbKknFbZC67okZGWqFP5aKIzLVh8xwBTL5adaGDPnWujoZv0JiaNMiyLjO428pDxngfMmN4DlYTUVyIMzIUO9QAJn/Gi1DfOTCtCJPSCz6sxAyoNNLQ4aUxvPye4BjOJLRaUbm4F84eMDZIhNTyKf4T7VMSbYMMQ/yysqADMmwKg8ZkGnhfo0D/UPY8WBGhsyBw4D5G1L/CmTybStrxWTyGBFtnp9aDMhQNVwaMuDvLp/gSeHZurxF9tW4yFYgU3yRTdSwzS9Deq2IX+Yu8XTxkAS6FygZb/kKqhQNg9aMFRm6oP/zcMzJTUMVrBXI5O9Skvd3YMpIJi3LawkLMiT9oSRkUpj14EqcKlesyNC8u9yuQeLpegp8GAUy+ctsyOzJfGoJGNAm5w1zEzJDr4dKQgakR9LlGdhsHrLwrMjQbMTcBPhCfgy4h+TIOFWajJFsEv6yrLLJustJxAzm/qat+gqWx/J2OZSDzJwmiYNJB2SmgmX/Q4zI0CSC/FOovzGQ0SFHxnGT2pCZEcN1I3pfV4jL1LGIounifh2dL/F8iipk2GwksIIG/+1SNROqamVEBmx/y+lm+r6vvDEjR8ZZVhiz8miITr9kovstncxmwT4mkHTQdmcm0oVX//jVnLDWKtiJgiZikNEZ2NplRAY8JNf1M/orb4PLkXHuYUSG5u0KN4rnhGaxOsarYLck6j83glxK7i+oOgoDWkuqZsj2zT8xIkO3hF9zv6bU48hncoqRccehERlaXkCfy0NL5zlJhxJkQIjO9bmWgQzIWmUqagQjl77YkAGDxBloVP3jeqd3ESPjzvbWfUwHcl9tXh6YlCP7mMBNljTtyfm9DGRQ1gM2EEB+P18B1IQMXXd414G1HVvAWoyMO4NYkaHR/o0yzERdHW4mmwgZMLCdn8tABljZ3NcF2/FYNWNCBiiZg/PBlqDYFXfj9DL15HOKamV5esqKDNARuiPpwXBwe1eGDL2No6pKQAaojiv3X9KbgUIdFmRQcRuv20ENK02tYxoLJ31mRWZG7ayOxp2XAleHC7MMGWpUOaZaCcgAA4VP0gQfjCPBggxwQvupXMitEHIPebI80Mu9aLi5vgxQkfJqlLBvvcxmGTIpMWacni+OzJ4ug058F4F9K9wYNyCDClSR2nzgP4p9iaict/e6ZmRGYEe7fJMtqq3jzfoyZGgmrDPqiiMDUqtCdXRAbS/GMaJHBvoliXMDVcDpSJezqBDgpwelvVYeqsUqLX4D5nxaPNyoZZzprTAyYPcsa8l8vRn9P+MYUSMDi7O2yd/Q1JIcZEYDOumc1GewIwOr0cu2c8Jiy/4iXYYMLQ7vtL8wMmDMBp2WKV1fMY4RLTL4yFfQGFjA/V2SnfKMRjJJLixQ9xeWo5fMmi20kiMZNzJk6Lhwfi6KTJe+5DXcQWAliOdrJTJIAdxeB+Q2oDqEt/6NV4yChZzpvFoAGVSEK3gm7Y/gSlAkSVWEDNjU7vxeFBlgc8V26ANrBo5wFTJz5uwH6D/FlYk3kVKGS3z+C91uWQCZOU3OuMtn5Aa4CirJp5MhQy3Cfvh3HTIpUDIxqwBQBjNDNMg0mfN1OvDfILX9SyahPLgGvgjMqkWOvWDOf3gPTU4tpj4hNYIkyMypDnZ9EAWRAQoxmhgEIoOwqpUcGQ4YtjwhW9HvyEAzH3FlI4FqKnS4Dp78kuTMQdPkDr8C+8QEyABb08tKKIgMKAEfNyNBqhWaE6TI9KZsPXM2egRPifh6/S1q/+iFO2EKHZpIkBkqkOmyx71PEDTNC3eCVxv4LgTIgJ7xkpqKIWNRMrdeodY9GofkX2C1mY3w5P8t/IERtCLyn7yvW9lfECNd7rmBn+R3e+eEekg0id+tQEH/026ZC69krIK5C1qbx5DJdmhl4EVcaIqVIniagiYfe77Q68A3AGYqQea8y9+2sa4ft4dAn+Hvyb23I6+TcX13f8Lz2yT4CGgxU2RW9QUj9R3pb7z0+5H25Pi8WDd2i+fIy0MFS5G5/FXkbNS3+Mg5z5lIum6wbZCPzkEAPE8DX5A9Adx/HUoq8DS4N45J0AcWPWohETwBewegH5YV2j3x85jjgrdaoh0G0Q7te58GjTby2X35vVhSSRydVydTM0WPVo+kQYZOMxQKPRD4S3TI0G3GXdaaF8sQW5SmTSn+yCtytPpe9m9yVAlsOg1lFkSGNX1/ZBaygkTCbYHSIQPWC13dDahwNaYtyLxGj72QyM+10nEKLGLgeCPTSDFk4nUT0HJSI+wGWCUygG18xKRcOHeEBRliixZARv58mkQFFNTB/08hZCQnLDGHeAqlzxrXSmSQU0qowBlh/X6Wyg9k6BVAhnHRAwHpiGBW8HEugozgbNEazHMXC3dqe02NDIywZKx7JiqBYJkemQ19TTsyYEcQJ2CDG1hsvXifuQAy0iw7OzOrgMdSi0yC+M6s0+Y14FpQIzMACsuOTMDBRYQuhwQbWczIDBVHcgWdILz4WVWOqJGB3p1UrsXz8hJyG6qRQS0zI0MrtQQEbHADYX7Py2FF5iw7VO5HRobHXMNMqpF5x4bXTm95DML6VYsMdOWbkdENT+BVA58qi/1BImNlvTB8KnlIcDncP1Ejwzkdl1o/QCznR4nMFupSKzLgTLqQkOUQVDNuRqcJmaBeZqQnc0n+yDW6hVGPDC1I9yM7TSccomeXqpAZMiBbkUHp7CGhZlRKe8PdtWNApt8wVbHsxqMHD7nEpz09MnxeRxY7qD7Xsvho0SBz5dpkRSYQCYYyoeMIhMGd1bgWmc1Zfqa0L/M3kfNsuJIoMQMygcMKZ8+SjuhvJfOxHJkOb+AbkdEqGRR9A5kh7byVoENmc7EDc5dsEXXsDbayA2UNyASPqu3uYubWx0I2H4uRmZqTABhBpRJjAor8glSrvJpRIDP82HVNU1Je0mwbUDXt12epXW1BJhwRS7Pjgbvp5vC5lLZMhszgYxTqTBsyOBE+LGAcgH/lXl6ITH9y3JV2ptJoPEHY9LcLRUVVUHw/KoOoibRcv538Lz48bxeao7QFyAwn9cgdbciolhg/AsZReA9UBJlB5+k0XTT3WbnHic6z/Wh8emRHbg6r7a6lq8Dbeu2rpSOpWDVb7nvHl3N/OGgfPlbbRmupHCtBZNqvq7d1cxnV1iZk/gMEvRcpf7yaiQAAAABJRU5ErkJggg==",
            ],
        ]
    ];
});

// コメント一覧
Route::get('/posts/{postId}/comment', [App\Http\Controllers\getCommentListController::class, 'list']);
// Route::get('/posts/{postId}/comment', function (Request $request) {
//     return [
//         "comments" => [
//             [
//                 "comment" => "コメント1",
//                 "name" => "山田",
//                 "date" => "2023-03-11T12:34:56+09:00"
//             ],
//             [
//                 "comment" => "コメント2",
//                 "name" => "田中",
//                 "date" => "2023-03-11T12:34:56+09:00"
//             ],
//         ]
//     ];
// });

// コメント投稿
// Route::post('/posts/{postId}/comment', [App\Http\Controllers\PostCommentController::class, 'store']);
Route::post('/posts/{postId}/comment', function (Request $request) {
    return "";
});
