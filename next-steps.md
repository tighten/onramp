1. ~Flesh out the relationships on all models~
2. ~Build factories~
4. ~Allow users to have "completed" skills, resources, and modules~
    1. ~^^ remember to start diving into tests here~
5. ~Add tracks~

## Necessary to launch the db-backed version
- [ ] checkboxes need to work or be hidden
- [ ] handle "bonus" material
- [ ] write intro content on modules.index and modules.show
- [ ] migrate all content from the master branch learn.en and learn.es files into the database seeders
- [ ] decide: do we show the content to non-logged-in users?

6. Add the idea of the "order" of modules within a track
7. Investigate: where else do we need "order"
8. Deal with the rigamarole of "mustverifyemail" for users
9. Use consts, or a PHP enum, or something to cement the list of resource types
11. Consider/decide: allow for marking a give module as "current"
12. Upgrade to Laravel 6
14. Audit all new pages on the mes-database-backed branch for final text, and then convert it all to __() language calls


---

## Entities:
- Tracks
- Modules
    - Resources
    - Skills
    - Quizzes (?)
    - Exercises (?)
- Users
- Completions (pivot between user and ___)
