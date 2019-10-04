1. ~Flesh out the relationships on all models~
2. ~Build factories~
4. ~Allow users to have "completed" skills, resources, and modules~
    1. ~^^ remember to start diving into tests here~
5. ~Add tracks~
6. Add the idea of the "order" of modules within a track
7. Investigate: where else do we need "order"
8. Deal with the rigamarole of "mustverifyemail" for users
9. Use consts, or a PHP enum, or something to cement the list of resource types
10. Start building the UI for it
11. Consider/decide: allow for marking a give module as "current"
12. Upgrade to Laravel 6


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
