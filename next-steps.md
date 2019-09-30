1. ~Flesh out the relationships on all models~
2. ~Build factories~
4. ~Allow users to have "completed" skills, resources, and modules~
    1. ~^^ remember to start diving into tests here~
5. Add tracks
6. Deal with the rigamarole of "mustverifyemail" for users
7. Use consts, or a PHP enum, or something to cement the list of resource types
8. Start building the UI for it


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

---

What is track doing?
Purely scoping the list of modules you see.
Therefore users can change tracks at any point, and all it does is change the modules they're presented.

---

Track:
    id
    name

User:
    track_id nullable (null = just exploring)

Module:
    pivot module_track table
        module_id
        track_id
        order ?

## New to Programming Track
- "Build a website" module
- "Eloquent for everyone else" module

## WordPress Track
- "Eloquent for WordPress devs" module

## Frontend Developer Track
- "Eloquent for everyone else" module

---

## Next steps for tracks

- Make table and model for Track
- Make pivot for module_track
- Build out connective methods and tests for them
- Add factory
- ?
