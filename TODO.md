# Fix SortieStock SQL Error - Column 'equipement_id' Not Found

Status: In Progress

## Steps:

### 1. Project Setup & Planning [DONE]
- Analyzed error, schema, models, controller, views
- Confirmed plan with user

### 2. Fix LigneSortieModel.php column names [PENDING]
- Change ls.equipement_id → ls.id_equipement
- Change ls.sortiestock_id → ls.id_sortie

### 3. Update SortieStockModel.php queries [PENDING]
- Rewrite getWithDetails() and getById() with correlated subqueries for first line's equipement details
- Compatible with index.php view (single summary)

### 4. Testing [PENDING]
- Reload http://localhost/GestionStock_bold/sortie-stock/
- Verify no SQL error, data displays (equipement_nom, quantite)

### 5. Git & PR Preparation [PENDING]
- Install GitHub CLI (winget)
- Create branch blackboxai/fix-sortie-stock-sql-error
- git add / commit / push
- gh pr create

Last updated: $(date)
