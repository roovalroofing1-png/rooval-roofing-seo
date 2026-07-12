# 2026-07-12 — Cross-link to Rooval Deck & Beam Builders

Owner launched a sister company (Rooval Deck & Beam Builders, DBA of Rooval LLC,
roovaldeckbuilders.com). Two changes to connect the entities:

1. **WPCode snippet 2618** (Footer Legal Bar): appended a sitewide link
   "Rooval Deck & Beam Builders" -> https://roovaldeckbuilders.com/
   after the Terms & Conditions link. Verified live (1 occurrence on homepage).
2. **WPCode snippet 2352** (LocalBusiness Schema Markup): added
   "https://roovaldeckbuilders.com" to the RoofingContractor sameAs array.
   Verified live: sameAs = [facebook, roovaldeckbuilders.com]; JSON validated.

The deck site already links back (footer "Sister company to Rooval Roofing" +
schema sameAs -> rooval-roofing.com), so the entity relationship is now bidirectional.

Note: snippet 2352 is the schema snippet (NOT 2636 — that's the CRM lead webhook).
