# Verified NOAA Storm Data — Salt Lake & Utah Counties (WS6 source of truth)

Source: NOAA NCEI Storm Events Database (https://www.ncei.noaa.gov/stormevents/), bulk annual detail CSVs, downloaded 2026-07-13. County-based (CZ_TYPE=C) events only. NOAA codes by COUNTY, not city.
Coverage: 2016–2025 complete years + 2026 YTD (2026 file compiled 2026-06-25, so pre-summer-monsoon; expect low 2026 counts).
Thresholds: Hail ≥1.00 in; Thunderstorm Wind ≥50 kt (~58 mph). Raw rows in noaa-utah-storm-events-2016-2026.json.

## Significant events by year (both counties combined)
| Year | Hail ≥1" | Wind ≥58 mph |
|---|---|---|
| 2016 | 4 | 14 |
| 2017 | 1 | 4 |
| 2018 | 2 | 4 |
| 2019 | 0 | 12 |
| 2020 | 0 | 18 |
| 2021 | 2 | 26 |
| 2022 | 0 | 43 |
| 2023 | 4 | 58 |
| 2024 | 8 | 27 |
| 2025 | 0 | 21 |
| 2026 YTD | 0 | 0 |
| **Total** | **21** | **227** |

## Per county (2016–2026 YTD)
- Salt Lake County: 14 significant hail, 150 damaging wind
- Utah County: 7 significant hail, 77 damaging wind

## Records
- Largest hail: 1.75" — Salt Lake Co 2016-06-13; Utah Co 2024-08-13
- Strongest gust: 83 kt (~96 mph) — Salt Lake Co 2024-07-13
- All hail events (any size): 37 · All t-storm wind events (any speed): 229 · Qualifying rows: 266

INTEGRITY NOTE: publish only numbers backed by the JSON rows. Date-stamp figures ("per NOAA through June 2026"), link NCEI as source, refresh annually.
