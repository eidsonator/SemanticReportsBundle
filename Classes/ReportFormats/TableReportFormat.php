<?php

namespace Eidsonator\SemanticReportsBundle\Classes\ReportFormats;

use Eidsonator\SemanticReportsBundle\lib\PhpReports\ReportFormatBase;
use Eidsonator\SemanticReportsBundle\lib\PhpReports\Report;
use Symfony\Component\HttpFoundation\Request;

class TableReportFormat extends ReportFormatBase
{
    public static function display(Report &$report, Request &$request)
    {
        $report->options['inline_email'] = true;
        $report->use_cache = true;
        $template = '@SemanticReports/Default/html/table.twig';
        $vars = [];
        try {
            $report->renderReportPage($template, $vars);
        } catch (\Exception $e) {
        }
        return ["template" => $template, "vars" => $vars];
    }
}
