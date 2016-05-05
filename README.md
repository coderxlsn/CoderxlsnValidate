CoderxlsnValidate Check Iframe in HTML
============================================

[![Build Status](https://travis-ci.org/coderxlsn/CoderxlsnValidate.git.svg?branch=master)](http://travis-ci.org/coderxlsn/CoderxlsnValidate)


Installation
------------

Simplest is to add the following to `composer.json`:

```javascript
{
    "require": {
        "coderxlsn/doctrine_validate_frame": "~1.0"
    }
}
```

And then run:

```bash
php composer.phar install
```

Alternately, use git to install this as a submodule:

```bash
git submodule add git://github.com/coderxlsn/CoderxlsnValidate vendor/coderxlsn
```

Usage
-----

### Entity

Add to validate model

```php
namespace My;

* @ORM\EntityListeners({ "CoderxlsnValidate\Doctrine\Listener\IframeValidate"})

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\EntityListeners({ "CoderxlsnValidate\Doctrine\Listener\IframeValidate"})
 * @ORM\Table(name="events")
 */
class Model
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",unique=true);
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false))
     */
    protected $name;

```
 If the upgrade falls text frame , an error is sent to the email admin