<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks {
  // define public methods as commands
  
  function hello($world = 'default') {
    $this->say("Hello, $world");
  }
  
  function watch() {
    $this->taskWatch()
      ->monitor(
        'tests/wpunit',
        function() {
          $this->_exec('vendor/bin/codecept run wpunit --debug');
        }
      );
  }
}