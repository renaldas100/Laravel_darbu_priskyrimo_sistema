# Darbų priskyrimo sistema

Naudotos technologijos: LARAVEL

Sukurta sistemą kuri yra skirta darbuotojams, įmonėje vykdomiems darbams ir paskirstymui saugoti.
Sudarytos trys lentelės:  

users:  
id  
name  
email  

tasks:  
id       
name - string  
status - int  

task_user:  
id  
user_id  
task_id  

1. Sukurtas naujas Laravel projektas
2. Susikurkta DB
3. Surašyta į Laravel DB konfigūracijos
4. Padaryta prisijungimo sistema
5. Sukurtas papildomos lentelės task migracijos failas, modelis ir kontroleris kuris bus resursas
6. Sukurtas papildomos lentelės task_user migracijos failas
7. Migruota DB
8. Sukurtas užduočių tasks redagavimo puslapis (užduotis galima pridėti, koreguoti ir ištrinti)
9. Padaryti puslapiai kurie skirti užduočių priskyrimui vartotojams, bei užbaigta/neužbaigta pasirinkimui
10. Padaryta galimybė įkelti vartotojo nuotraukas prie vartotojo (vienas vartotojas gali turėti daugiau nei vieną nuotrauką), nuotraukos atvaizduojamos prie vartotojo, taip pat yra galimybė ištrinti nuotraukas ir įkelti naujas nuotrauką.

Printscreens:

![Priskyrimai_large](https://user-images.githubusercontent.com/117721797/224480320-59f4aafd-b88c-443c-9530-6dd8674924df.png)



