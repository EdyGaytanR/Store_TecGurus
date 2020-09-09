SELECT
    c.name,
    COUNT(*) as number
FROM
    categories c
INNER JOIN products p ON
    c.id_category = p.id_category
    GROUP BY c.id_category