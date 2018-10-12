## PHP benchmark solution

Find the best solution by using benchmark

## Installation

```bash
composer require --dev skillaug/benchmark "~1.0.0"
```
## Usages

### Basic
```php
\skillaug\Benchmark::begin();

// your codes for benchmark here

\skillaug\Benchmark::end();
```

example results

```text
Time:                     74 Mili second(s)
Memory_get_usage:         26 Megabyte(s)
Memory_get_peak_usage:    25.961 Megabyte(s)
```

### With unit options

```php
\skillaug\Benchmark::begin([
    'time' => 's', // second(s)
    'memory' => 'kb', // kilobyte(s)
]);
```

example results

```text
Time:                     0.0759 Second(s)
Memory_get_usage:         26624.06 Kilobyte(s)
Memory_get_peak_usage:    26584.53 Kilobyte(s)
```

## License

The BSD 3-Clause "New" or "Revised" License.