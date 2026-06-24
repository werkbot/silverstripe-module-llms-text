# SilverStripe LLMs Text Module

A SilverStripe module that provides a textarea field for llms.txt content.

## Installation
```
composer require werkbot/werkbot-llms-txt
```

## Setup
- You will need to run `/dev/build`

## Usage
- There should now be a textarea field in your site's setting for the llms.txt content.
- /llms.txt will return this content.

## Testing
```
./vendor/bin/phpunit vendor/werkbot/werkbot-llms-txt
```

## Documentation
Generate documentation using Doctum:
```
./vendor/bin/doctum.php update doctum.config.php
```

View the api documentation:
```
start doctum_build/index.html
```

## Example Sources
The seeder content and testing fixture come from https://github.com/henu-wang/llms-txt-examples/blob/main/examples/local-business.txt.
