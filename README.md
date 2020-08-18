# renanliberato/exposer

Render UI elements as functional components.

## Installing

```composer require renanliberato/exposer```

## Getting Started

The library API is currently quite simple, check it out:

```php
use function RenanLiberato\Exposer\render;
use function RenanLiberato\Exposer\renderComponent;

echo render('li', [
    'href' => '/about',
    'children' => 'Hello!'
]);
// <li href="/about">Hello!</li>

class Profile {
    public function __invoke($props = []) {
        $birthYear = date('Y') - $props['age'];

        return render('div', [
            'style' => [
                'display' => 'flex',
                'align-items' => 'center',
            ],
            'children' => [
                render('p', [
                    'children' => "I am {$props['name']}"
                ]),
                render('p', [
                    'children' => "I was born in {$birthYear}"
                ]),
            ]
        ])
    }
}

echo renderComponent(Profile::class, [
    'name' => 'Renan',
    'age' => 23
])
// <div style="display: flex; align-items: center;">   
//     <p>I am Renan</p>
//     <p>I was born in 1997</p>
// </div>
```