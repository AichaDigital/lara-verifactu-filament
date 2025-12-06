# Lara-Verifactu Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aichadigital/lara-verifactu-filament.svg?style=flat-square)](https://packagist.org/packages/aichadigital/lara-verifactu-filament)
[![Total Downloads](https://img.shields.io/packagist/dt/aichadigital/lara-verifactu-filament.svg?style=flat-square)](https://packagist.org/packages/aichadigital/lara-verifactu-filament)

> **Warning**
> This package is under active development and is NOT ready for production use.
> API and features may change without notice.

---

Filament admin panel resources for [Lara-Verifactu](https://github.com/AichaDigital/lara-verifactu) - Spanish AEAT Verifactu integration.

## Requirements

- PHP 8.4+
- Laravel 11.x / 12.x
- Filament 4.x
- [aichadigital/lara-verifactu](https://github.com/AichaDigital/lara-verifactu) ^0.1
- [aichadigital/larabill-filament](https://github.com/AichaDigital/larabill-filament) ^0.1

## Installation

```bash
composer require aichadigital/lara-verifactu-filament
```

## Features

This package adds Verifactu (AEAT Spain) functionality to Larabill Filament:

- **Invoice Verification Status** - View Verifactu submission status
- **AEAT Configuration** - Manage Spanish tax authority settings
- **QR Code Display** - Show fiscal verification QR codes
- **Registry Management** - Track invoice registry with AEAT

## Usage

Resources are automatically registered and extend LarabillFilament InvoiceResource.

## Related Packages

| Package | Description |
|---------|-------------|
| [lara-verifactu](https://github.com/AichaDigital/lara-verifactu) | Core Verifactu backend |
| [larabill-filament](https://github.com/AichaDigital/larabill-filament) | Base billing UI (required) |

## Testing

```bash
composer test
```

## Credits

- [Abdelkarim Mateos Sanchez](https://github.com/abkrim)
- [All Contributors](../../contributors)

## License

MIT License. See [LICENSE](LICENSE.md) for details.
