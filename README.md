# WaitGroup
Implement simple WaitGroup to pocketmine.
## Usage
```php
$wg = new WaitGroup();

foreach($asyncTasks as $task) {
  $wg->add(1);
  $task->do()->then(function() use ($wg) {
    $wg->done();
  });
}

$wg->wait(function() {
  echo "all tasks are finished at this point";
});
```
