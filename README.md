# Test Tc


## Odpowiedzi do pytań z testu TEST TC PHP

####1. Różnica między public, protected, private
public - metoda,zmienna dostępna z zewnątrz instancji obiektu

protected - metoda zmienna niedostępna na zewnątrz, 
dostępna dla klas dziedziczących

private - metoda zmienna dostępna tylko w wewnątrz klasy, niedostępna
także dla klas dziedziczących.

### 2.Dlaczego brak metody getType w klasie Fruit powoduje błąd
Ponieważ klasa Fruit dziedziczy po klasie abstrakcyjnej Plant.
Ta z kolei implementuje interfejs PlantInterface, w której
znajduje się "interfejs" metody getType.
Każda klasa, która implementuje interfejs, musi mieć
zaimplementowany interfejs. Jeżeli jest to klasa abstrakcyjna
to klasa abstrakcyjna nie musi mieć tej implementacji,
gdyż i tak nie można utworzyć jej instancji.

### 3.Czym jest klasa abstrakcyjna
Nie można utworzyć instancji obiektu klasy abstrakcyjnej. Owa może
być jedynie dziedziczona przez klasy dzieci.

### 4.Co trzeba zmienić w funkcji checkObject by działała poprawnie i dlaczego
Oryginalna funkcja checkType wymagała jako parametru
obiektu klasy Fruit. To powodowało, że metoda akceptowała
tylko tą jedną klasę. Należy zmienić aby metoda akceptowała
wszystkie klasy, które implementują interfejs PlantInterface. Wtedy mamy pewność,
że obiekt, który trafi do tej metody, ma implementację getType().

### 5.Jak można zastosować wyjątki (konstrukcja try cache) by zapobiec błędne wywołania funkcji checkObject (PHP 7 TypeError)
TypeError jest klasą Exception. Więc w try catchu, należy przechwycić wyjątek TypeError
i zwrócić kulturalny komunikat.

-------
## Zagadnienia SQL

### 1.Utworzenie tabeli create table

```$xslt
  CREATE TABLE public.users
    (
        id serial PRIMARY KEY,
        name varchar(80) NOT NULL,
        surname varchar(80) NOT NULL,
        created timestamp NOT NULL
    )


``` 

### 2.Dodanie rekordu do tabeli insert

```$xslt
INSERT INTO public.users ("id", "name", "surname", "created") VALUES (DEFAULT, 'Charles', 'Leclerc', '2018-11-06 21:09:59.501000')
```
### 3.Zmiana danych w tabeli update
```$xslt
 UPDATE public.users SET "name" = 'Lewis', "surname" = 'Hamilton' WHERE "id" = 1
```
### 4.Pobranie danych konstrukcja select
```$xslt
SELECT * FROM public.users;
```
### 5.Łączenie tabel konstrukcja join, inner join, left join, right join
```$xslt
SELECT 
    *
FROM
    users
INNER JOIN addresses ON users.id = addresses.user_id  ;
```
JOIN - W PostrgesSQL domyślnie jest [INNER] JOIN

INNER JOIN, zwraca tylko terekordy z tabeli A i B które spełniają warunek ON

LEFT [OUTER] JOIN - Zwraca wszystkie rekordy z tabeli po "lewej" strony JOIN,
natomiast, tam gdzie tabela z prawej nie spełnia warunku z ON, zwracane są puste wartości.

RIGHT [OUTER] JOIN - wszytkie rekordy po prawej, po lewej tylko spełniające warunku, braki uzupełnione nullami.
  

### 6.Zawężenie rekordów słowo kluczowe „where”
```$xslt
 SELECT * FROM users WHERE id = 1;
```
### 7.wykorzystanie podzapytania konstrukcja „in”
```$xslt
SELECT 
    col1 
FROM 
    tab1
WHERE 
    col1 IN (
        SELECT colA FROM tab2
    )
```
### 8.Słowa kluczowe „order by” oraz „limit”
```$xslt
 SELECT 
    *
 FROM
    users
 ORDER BY created DESC
 LIMIT 10  
```
### 9.Grupowanie i agregacja wyników słowa kluczowe „group by”
```$xslt
SELECT
    SUM(colA)
FROM
    table1
GROUP BY 
    colB

```
---
## Podstawowe zagadnienia JS
### 1.Utwórz obiekt w JS
```angular2html
var a = {};
```
### 2.Dodaj funckję w obiekcie która wywoła przekierowanie na inną stronę. Jeśli wartość parametru wejściowego będzie równa 1 – prośba o sprawdzenie także typu danych czy jest to integer
```angularjs
var a = {
    redirect: function(param) {
        if (typeof param == "number" && param == 1) {
            window.location = "http://new.web";
        }
    }
}
```
### 3.Wywołaj funckję z utworzonego obiektu
```angularjs
a.redirect(1);
```
### 4.Utwórz input text o id = „test”
```html
<input type="text" id="test" name="test" />
```
### 5.Złap element po ID i zmień wartość na dowolny tekst
```html
var inputElement = document.getElementById('test');
inputElement.value = 'dowolny tekst';
```
### Wykorzystanie ES6 w React

 1.Utwórz projekt w oparciu o bibliotekę https://reactjs.org lub zmodyfikuj kod aplikacji demonstracyjnej https://reactjs.org/docs/hello-world.html
 
 2.Utwórz dowolną klasę i dodaj dowolną metodę
 
 3.Wywołaj metodę z utworzonej klasy
 
 4.Dodaj komponent i wyświetl go w aplikacji
 
 5.Przekaż do komponentu jakąś wartość i wyświetl ją na ekranie (props)
 
 6.Dodaj funkcję w komponencie która zmieni state komponentu
 
 7.Dodaj przycisk który wywoła funkcję

```html
class Welcome extends React.Component {

  someFunction() {
      this.setState({
        a: 'b'
      });
  }

  render() {
      return (
        <button onClick={this.someFunction}>
          Click
        </button>
      );
  }
}
```
