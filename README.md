Aplikacja umożliwia rejestrowanie różnego rodzaju użytkowników oraz ich zarządzaniem (lista, edycja, usuwanie). Aplikacja składa się z częsci rejestracyjnej oraz administracyjnej.
Uruchomienie aplikacji:

Sklonuj repozytorium projektu:
git clone [URL_REPOZYTORIUM]
Wejdź do folderu projektu:

Uruchom usługi Docker przy użyciu Docker Compose:
docker-compose up -d --build

Aby się zarejestrować przejdź na adres: http://127.0.0.1:8000/register -> po udanej rejestracji zostanie wysłany mail z potwerdzeniem rejestracji.
(testowo skorzystano z MailHog. Uruchamia się przy budowaniu aplikacji przez Docker. Aby sprawdzić mail wystarczy wejść na adres http://localhost:8025/).

Kolejnym etapem jest logowanie: http://127.0.0.1:8000/login podaj adres email oraz hasło które zostało wysłane na adres email.

Po zalogowniu zostaniemy przekierowani do panelu administracyjnego http://127.0.0.1:8000/admin gdzie możemy dodawać i edytować użytkowników.
