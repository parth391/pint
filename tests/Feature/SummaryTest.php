<?php

it('may fail with style issues', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/with-fixable-issues'),
    ]);

    expect($statusCode)->toBe(1)
        ->and($output->fetch())
        ->toContain('FAIL')
        ->toContain('1 file, 1 style issue');
});

it('may fail with errors', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/with-non-fixable-issues'),
    ]);

    expect($statusCode)->toBe(1)
        ->and($output->fetch())
        ->toContain('FAIL')
        ->toContain('1 file, 1 error');
});

it('may pass', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/without-issues'),
    ]);

    expect($statusCode)->toBe(0)
        ->and($output->fetch())
        ->toContain('PASS');
});