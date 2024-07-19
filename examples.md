## Weighted Results in SQL

Raw query:

```
SELECT *,
    CASE
        WHEN MATCH(`name`) AGAINST ('tom*' IN boolean mode) THEN 3
        WHEN MATCH(`email`) AGAINST ('tom*' IN boolean mode) THEN 2
        WHEN MATCH(`address`) AGAINST ('tom*' IN boolean mode) THEN 1
        ELSE 0
    END AS weight
FROM `customers`
WHERE MATCH(`name`, `email`, `address`)
AGAINST ('tom*' IN boolean mode)
ORDER BY weight DESC;
```

Laravel's query builder:

```
$keyword = 'tom*';

$customers = DB::table('customers')
    ->select('*', DB::raw("
        CASE
            WHEN MATCH(`name`) AGAINST (? IN boolean mode) THEN 3
            WHEN MATCH(`email`) AGAINST (? IN boolean mode) THEN 2
            WHEN MATCH(`address`) AGAINST (? IN boolean mode) THEN 1
            ELSE 0
        END AS weight
    ", [$keyword, $keyword, $keyword]))
    ->whereRaw("MATCH(`name`, `email`, `address`) AGAINST (? IN boolean mode)", [$keyword])
    ->orderBy('weight', 'desc')
    ->get();

return $customers;
```
