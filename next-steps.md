1. ~Flesh out the relationships on all models~
2. ~Build factories~
4. ~Allow users to have "completed" skills, resources, and modules~
    1. ~^^ remember to start diving into tests here~
5. ~Add tracks~

## Necessary to launch the db-backed version
- [x] Hide checkboxes
- [x] Handle "bonus" material
    - [x] Allow for marking resources as bonus
    - [x] Allow for marking skills as bonus
    - [x] Differentiate bonus resources and skills in the UI list
- [x] decide: do we show the content to non-logged-in users? Answer: YES
- [x] Allow guests to view learning pages
    - [x] Allow them to visit
    - [x] Ensure it doesn't break
    - [x] Show a "If you were logged in you could ___ message to guests"
    - [x] Then hide that message ^^ until we have checkboxes working
- [ ] Write intro content on modules.index and modules.show
- [ ] Migrate all content from the master branch `learn.en` and `learn.es` files into the database seeders
- [ ] Figure out how we handle resources that are links to projects (e.g. vagrant)... not really an "article"
- [ ] Allow for translating a skill name
- [ ] Add language to resources
- [ ] Decide: Do we need to be able to group our resources? e.g. all the hosting resources (valet, vagrant, etc.) are related.. all of the "php variables" resources are related... flat structure seems weak

## Immediate post-launch
- [ ] Make checkboxes work
- [ ] Refactor module show page to use a view presenter or something like it
- [ ] Evaluate and re-work microcopy (e.g. guest banner on learning pages)

6. Add the idea of the "order" of modules within a track
7. Investigate: where else do we need "order"
8. Deal with the rigamarole of "mustverifyemail" for users
9. Use consts, or a PHP enum, or something to cement the list of resource types
11. Consider/decide: allow for marking a give module as "current"
12. Upgrade to Laravel 6
14. Audit all new pages on the mes-database-backed branch for final text, and then convert it all to __() language calls
15. Allow for (e.g. Swedish) non-English UI while still seeing English resources (until that language has resources available for it)
16. When not in English UI, have a toggle: "Show resources in my language" or " show resources in english" (that only shows up if that language has resources)
17. Write auth tests around guest access to learning pages -- that they can see it, that it doesn't redirect them or error out, that they don't see the checkboxes, that they do see the "You should login or register" banner
18. Add a banner on the site saying "this is a WIP! Follow along on twitch/youtube"
19. Remember to localize all newly-written text


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

What is bonus?
- Bonus is something that, regardless of your track, is not *necessary* to know to get a job doing Laravel, but could be helpful--for example, Tailwind.
