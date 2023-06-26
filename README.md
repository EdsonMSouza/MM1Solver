# MM1Solver - API para resolução de exercícios sobre Filas M/M/1

<code><img height="50" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png"></code>
<code><img height="50" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/json/json.png"></code>

Esta API fornece recursos para resolução de exercícios para Filas do tipo M/M/1.

## Versão do PHP
```html
PHP 7.4.3 (cli) (built: Jun  13 2022 13:43:30) ( NTS )
Copyright (c) The PHP Group Zend Engine v3.4.0, 
Copyright (c) Zend Technologies with Zend OPcache v7.4.3, 
Copyright (c), by Zend Technologies
```

## Como usar esse conteúdo?

Este conteúdo é livre para uso e distribuição sob a licença (CC BY-SA 4.0).

Se quiser colaborar neste repositório com quaisquer melhorias que você tenha feito, basta fazer um _fork_ e enviar um PR.

## Composer

Mudanças devem ser atualizadas via <code>composer dump-autoload -o</code> no ambiente de desenvolvimento.

## Domínio

O `domínio` variable must be filled with the address where the API will be made available like: (<code>https://**domain**/api/{resource}/{parameter}</code>)

### Recursos da API (exemplo)

A API pode resolver 8 tipos de variáveis:

* TempoMedioEntreChegadas
* TempoMedioAtendimento
* TempoProvavelFila
* TempoProvavelSistema
* ProbabilidadeFilaVazia
* ProbabilidadeSistemaVazio
* OcupacaoSistema
* NumeroProvavelSistema
* NumeroProvavelFila

As variáveis acima podem ser calculadas individualmente, ou então usar `TODAS` para retornar todos os cálculos de uma só vez.

* parameter: **api/**
* method: **post**
* payload

```json
    {
        "variavel": "TempoMedioEntreChegadas", 
        "lambda": 50,
        "mi": 80 
    }
```

* success

```json
    {
        "variável": "Tempo médio entre chegadas",
        "lambda": 50,
        "mi": 80,
        "horas": 0.02,
        "minutos": 1.2,
        "segundos": 72
    }
```

* warnings

  ```json
  {"message": "Payload incorreto"}
  {"message": "Requisição inválida"}
  {"message": "Método não permitido"}
  {"message": "Número de argumentos inválidos (esperados três)"}
  ```

# Versão Demo (online)

* URI: [https://mm1solver-api.edsonmelo.com.br/api/](https://mm1solver-api.edsonmelo.com.br/api/)

---

## Como citar este conteúdo

```
DE SOUZA, Edson Melo (2023, June 26). PHP API MM1Solver v.1.0.
Disponível em: https://github.com/EdsonMSouza/MM1Solver
```

Or BibTeX for LaTeX:

```latex
@misc{desouza2023phpmm1solver,
  author = {DE SOUZA, Edson Melo},
  title = {PHP API MM1Solver v.1.0},
  url = {https://github.com/EdsonMSouza/MM1Solver},
  year = {2023},
  month = {June}
}
```

## License

[![CC BY-SA 4.0][cc-by-sa-shield]][cc-by-sa]

This work is licensed under a
[Creative Commons Attribution-ShareAlike 4.0 International License][cc-by-sa].

[![CC BY-SA 4.0][cc-by-sa-image]][cc-by-sa]

[cc-by-sa]: http://creativecommons.org/licenses/by-sa/4.0/

[cc-by-sa-image]: https://licensebuttons.net/l/by-sa/4.0/88x31.png

[cc-by-sa-shield]: https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg